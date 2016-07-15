<?php

/**
 * The Numerology Calculator Common class defines all functionality
 * for the front end of the plugin
 *
 * @package NMCL
 */

/**
 * The Numerology Calculator Common defines all functionality for
 * the front end of the plugin.
 *
 * This class registers the plugin shortcode, defines the layout and
 * styling for the viewer facing aspects of the plugin.
 *
 * @since    0.0.3
 */
class Numerology_Calculator_Common
{
    /**
     * A reference to the version of the plugin that is passed to this class from the caller.
     *
     * @access private
     * @var    string $version The current version of the plugin.
     */
    private $version;


    /**
     * Initializes this class and stores the current version of this plugin.
     *
     * @param    string $version The current version of this plugin.
     */
    public function __construct($version)
    {
        $this->version = $version;

        // Add shortcode for use in Posts
        add_shortcode('numerology-calculator', array($this, 'create_shortcode'));

        // Add support for AJAX requests
        add_action('wp_ajax_nmclLifePathNumber', array($this, 'nmclLifePathNumber'));
        add_action('wp_ajax_nopriv_nmclLifePathNumber', array($this, 'nmclLifePathNumber'));

    }

    /**
     * Enqueues the style sheet responsible for styling the contents of the
     * shortcode output.
     */
    public function enqueue_styles()
    {

        /* Ensure that jQuery is being loaded */
        wp_enqueue_script('jquery');

        wp_enqueue_script(
            'numerology-calculator-common-js',
            plugin_dir_url(__FILE__) . 'js/numerology-calculator-common.js',
            array('jquery')
        );

        wp_localize_script(
            'numerology-calculator-common-js',
            'commonjs',
            array(
                'ajaxurl' => admin_url('admin-ajax.php')
            )
        );

        wp_enqueue_style(
            'numerology-calculator-common-css',
            plugin_dir_url(__FILE__) . 'css/numerology-calculator-common.css',
            array(),
            $this->version,
            FALSE
        );

    }

    /**
     * Initialize shortcode for use in posts
     */
    public static function create_shortcode()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/form.php';
    }


    public function nmclLifePathNumber()
    {

        // Get birthday values from form submission
        parse_str($_POST['vars'], $bday);

        $life_path_number = $this->getLifePathNumber($bday);
        //echo "Life Path: " . $life_path_number;

        die();

    }

    public function getLifePathNumber($bday)
    {

        /**
         * Get Post Vars and convert to integer
         */
        $day = (int)$bday['day'];
        $month = (int)$bday['month'];
        $year = (int)$bday['year'];

        /**
         * Add individual integers
         */
        $initial_total = $this->initialBdayConversion($day, $month, $year);

        /**
         * Reduce to valid Life Path Number
         */
        $life_path_number = $this->computeLifePathNumber($initial_total);
        echo $life_path_number;

        /**
         * Retrieve Life Path Number description
         */
        $life_path_number_description = $this->getLifePathNumberDescription($life_path_number);

        echo $life_path_number_description;
    }

    /**
     * Converts birthday input to single integer via addition
     *
     * @param $day
     * @param $month
     * @param $year
     * @return int
     */
    public function initialBdayConversion($day, $month, $year)
    {
        // Split into array of single chars and combine in one array
        $total_array = array_merge(str_split($day, 1), str_split($month, 1), str_split($year, 1));

        // Initialize total to 0
        $initial_total = 0;

        // Add each array element together
        foreach ($total_array as $single_int) {
            $initial_total += $single_int;
        }
        return $initial_total;

    }

    /**
     * Reduces life path number to either less than 9 or a Master Number (11, 22, 33)
     *
     * @param $initial_total
     * @return mixed
     */
    public function computeLifePathNumber($initial_total)
    {

        if (($initial_total != 11) && ($initial_total != 22) && ($initial_total != 33) && ($initial_total >= 9)) {

            // Split into array of inividual integers
            $split = str_split($initial_total, 1);

            $reduced_total = 0;
            foreach ($split as $individual) {
                $reduced_total += $individual;
            }

            return $this->computeLifePathNumber($reduced_total);
        } else {
            return $initial_total;
        }
    }

    /**
     * Retrieves life path number description from options
     *
     * @param $life_path_number
     * @return mixed
     */
    public function getLifePathNumberDescription($life_path_number) {
        $nmcl_options = get_option('nmcl_options');

        return $nmcl_options['lpn' . $life_path_number];
    }
}
