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


    private $db;

    /**
     * Initializes this class and stores the current version of this plugin.
     *
     * @param    string $version The current version of this plugin.
     */
    public function __construct($version)
    {
        $this->version = $version;
        add_shortcode('numerology-calculator', array($this, 'create_shortcode'));

        add_action('wp_ajax_nmclLifePathNumber', array($this, 'nmclLifePathNumber'));
        add_action('wp_ajax_nopriv_nmclLifePathNumber', array($this, 'nmclLifePathNumber'));

        $this->db = $GLOBALS['wpdb'];
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

    public static function create_shortcode()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/form.php';
    }

    public function nmclLifePathNumber()
    {
        //$nmcl_options = get_option('nmcl_options');

        parse_str($_POST['vars'], $bday);
        $life_path_number = $this->getLifePathNumber($bday);
        echo $life_path_number;

        die();

    }

    public function getLifePathNumber($bday)
    {

        /**
         * Get Post Vars
         */
        $day = $bday['day'];
        $month_final = $bday['month'];
        $year = $bday['year'];

        $final_day = $this->getFinalInt($day);
        $final_year = $this->getFinalInt2($year);
        echo $final_day . ' Final Year: ' . $final_year;


    }


    // Int may need to be reduced 3 times
    public function getFinalInt($int)
    {
        // Split day into single integers
        $int_array = str_split($int, 1);

        // Set starting point for day
        $int_reduced = 0;

        // Add each integer together
        foreach ($int_array as $singleint) {
            $int_reduced += $singleint;
        }


        // Check if day is reduced to single digit integer
        if (strlen($int_reduced) == 1) {
            $int_final = $int_reduced;
        } else {

            // Reset day reduced to 0
            $int_final = 0;

            // Reduce day again by adding integers together
            $int_partial = str_split($int_reduced);

            // Add each integer and set to day_final
            foreach ($int_partial as $single_int) {
                $int_final += $single_int;
            }


        }
        return 'Int final is: ' . $int_final;
    }

    public function getFinalInt2($int)
    {
        $int = (int)$int;


        if ($int > 9) {

            // Revised starting point after reduction
            $int_reduced = 0;

            // Split multi-char int into single integers
            $int_array = str_split($int, 1);

            // Add each integer and set to day_final
            foreach ($int_array as $single_int) {
                $int_reduced += $single_int;
            }
            return $this->getFinalInt2($int_reduced);
        } else {

            return 'Int final is: ' . $int;
        }
    }
}
