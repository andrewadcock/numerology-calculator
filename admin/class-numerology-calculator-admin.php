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
            'Numerology Calculator Settings',
            array(
                $this,
                'main_settings_section_text'
            ),
            'numerology_calculator'
        );

        add_settings_field(
            'text_test',
            'Text Test',
            array(
                $this,
                'plugin_setting_string'
            ),
            'numerology_calculator',
            'settings_main'
        );

        add_settings_field(
            'theme_css_select',
            'Select Display Theme',
            array(
                $this,
                'theme_css_select'
            ),
            'numerology_calculator',
            'settings_main'
        );
    }

    public function main_settings_section_text()
    {
        echo '<p>This is the Numerology Calculator settings page. Please select from the options below.</p>';
        echo '<p>Add the shortcode <code>[numerology-calculator]</code> to you post or page.</p>';
    }

    public function plugin_setting_string()
    {
        $options = get_option('nmcl_options');
        echo "<input id='theme-css-select' name='nmcl_options[text_test]' size='40' type='text' value='{$options['text_test']}' />";
    }

    public function theme_css_select()
    {
        $options = get_option('nmcl_options');
        $theme_css_select = $options['theme_css_select'];
        ?>
        <select id='dropdown-test' name='nmcl_options[theme_css_select]'">
            <option value='none' <?php selected( $theme_css_select, 'none' ); ?>>None</option>
            <option value='light' <?php selected( $theme_css_select, 'light' ); ?>>Light</option>
            <option value='dark' <?php selected( $theme_css_select, 'dark' ); ?>>Dark</option>
        </select>

        <?php
    }

    public function options_validate($input)
    {
//        $newinput['theme_css_select'] = trim($input['theme_css_select']);
//
//        $newinput['dropdown_test'] = $input;
        $newinput = $input;
        return $newinput;
    }

}