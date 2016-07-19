<?php

/**
 * The Numerology Calculator Admin defines all functionality
 * for the dashboard and options page of the plugin
 *
 * @package NMCL
 */

/**
 * The Numerology Calculator Admin defines all functionality for the
 * dashboard and options page of the plugin.
 *
 * This class registers the plugin options page, defines the option page
 * layout, and registers the stylesheet responsible for styling the content
 * of the options page.
 *
 * @since    0.0.2
 */
class Numerology_Calculator_Admin
{

    /**
     * A reference to the version of the plugin that is passed to this class from the caller.
     *
     * @access private
     * @var    string $version The current version of the plugin.
     */
    private $version;

    /**
     * A reference to the option name settings for the plugin.
     *
     * @access protected
     * @var    string $option_name The options for the plugin.
     */
    protected $option_name = 'nmcl_options';


    /**
     * Initializes this class and stores the current version of this plugin.
     *
     * @param    string $version The current version of this plugin.
     */
    public function __construct($version)
    {
        $this->version = $version;
        $this->set_default_values();
    }

    /**
     * Enqueues the style sheet responsible for styling the contents of the
     * options page.
     */
    public function enqueue_styles()
    {

        wp_enqueue_style(
            'numerology-calculator-admin',
            plugin_dir_url(__FILE__) . 'css/numerology-calculator-admin.css',
            array(),
            $this->version,
            FALSE
        );
    }

    /**
     * Registers the options page that will display all plugin options.
     */
    public function add_options_pages()
    {
        add_options_page(
            'Numerology Calculator Options',
            'Numerology Options',
            'manage_options',
            'numerology-calculator-options',
            array(
                $this,
                'display_options_page'
            )
        );
    }

    /**
     * Displays the options page that will display all plugin options.
     */
    public function display_options_page()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/options-page.php';
    }

    /**
     * Registers settings, sections, and fields
     */
    public function admin_init()
    {
        register_setting(
            'nmcl_options',
            'nmcl_options',
            array(
                $this,
                'options_validate'
            )
        );

        add_settings_section(
            'settings_main',
            esc_html__('Numerology Calculator Settings', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'main_settings_section_text'
            ),
            'numerology_calculator'
        );

        add_settings_field(
            'theme_css_select',
            esc_html__('Select Display Theme', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'theme_css_select'
            ),
            'numerology_calculator',
            'settings_main'
        );

        add_settings_field(
            'lpn1',
            esc_html__('Life Path Number: 1', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn1'
            )
        );

        add_settings_field(
            'lpn2',
            esc_html__('Life Path Number: 2', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn2'
            )
        );

        add_settings_field(
            'lpn3',
            esc_html__('Life Path Number: 3', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn3'
            )
        );

        add_settings_field(
            'lpn4',
            esc_html__('Life Path Number: 4', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn4'
            )
        );

        add_settings_field(
            'lpn5',
            esc_html__('Life Path Number: 5', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn5'
            )
        );

        add_settings_field(
            'lpn6',
            esc_html__('Life Path Number: 6', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn6'
            )
        );

        add_settings_field(
            'lpn7',
            esc_html__('Life Path Number: 7', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn7'
            )
        );

        add_settings_field(
            'lpn8',
            esc_html__('Life Path Number: 8', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn8'
            )
        );

        add_settings_field(
            'lpn9',
            esc_html__('Life Path Number: 9', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn9'
            )
        );

        add_settings_field(
            'lpn11',
            esc_html__('Life Path Number: 11', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn11'
            )
        );

        add_settings_field(
            'lpn22',
            esc_html__('Life Path Number: 22', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn22'
            )
        );

        add_settings_field(
            'lpn33',
            esc_html__('Life Path Number: 33', NMCL_TEXT_DOMAIN),
            array(
                $this,
                'life_path_numbers'
            ),
            'numerology_calculator',
            'settings_main',
            array(
                'id' => 'lpn33'
            )
        );

    }

    /**
     * Generate plugin info for users
     */
    public function main_settings_section_text()
    {
        echo '<p class="description">' . __('This is the Numerology Calculator settings page. Please select from the options below.') . '</p>';
        echo '<p>' . __('Add the shortcode to a post or page.') . ' <code>[numerology-calculator]</code></p>';
    }


    /**
     * Generate dropdown select for CSS theme options
     */
    public function theme_css_select()
    {
        $options = get_option('nmcl_options');

        $theme_css_select = $options['theme_css_select'];
        ?>
        <select id='dropdown-test' name='nmcl_options[theme_css_select]'">
        <option value='none' <?php selected($theme_css_select, 'none'); ?>><?php _e('None', NMCL_TEXT_DOMAIN); ?></option>
        <option value='light' <?php selected($theme_css_select, 'light'); ?>><?php _e('Light', NMCL_TEXT_DOMAIN); ?></option>
        <option value='dark' <?php selected($theme_css_select, 'dark'); ?>><?php _e('Dark', NMCL_TEXT_DOMAIN); ?></option>
        </select>

        <?php
    }

    /**
     * Create textarea's for each life path number input
     *
     * @param $args
     */
    public function life_path_numbers($args)
    {
        $id = $args['id'];
        $options = get_option('nmcl_options');

        echo "<textarea id='{$id}' name='nmcl_options[{$id}]'>{$options[$id]}</textarea>";
    }

    /**
     * Validation for options
     *
     * @param $input
     * @return mixed
     */
    public function options_validate($input)
    {
        $newinput = $input;
        return $newinput;
    }

    /**
     * Set defaults for all plugin options, these will be added if the option is empty.
     */
    public function set_default_values()
    {
        if (get_option('nmcl_options') === false) {
            $nmcl_options_default = array(
                'theme_css_select' => 'none',
                'lpn1' => 'This is the default for Life Path Number: 1',
                'lpn2' => 'This is the default for Life Path Number: 2',
                'lpn3' => 'This is the default for Life Path Number: 3',
                'lpn4' => 'This is the default for Life Path Number: 4',
                'lpn5' => 'This is the default for Life Path Number: 5',
                'lpn6' => 'This is the default for Life Path Number: 6',
                'lpn7' => 'This is the default for Life Path Number: 7',
                'lpn8' => 'This is the default for Life Path Number: 8',
                'lpn9' => 'This is the default for Life Path Number: 9',
                'lpn11' => 'This is the default for Life Path Number: 11',
                'lpn22' => 'This is the default for Life Path Number: 22',
                'lpn33' => 'This is the default for Life Path Number: 33'
            );

            update_option('nmcl_options', $nmcl_options_default);
        }
    }

}