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
            'Numerology Calculator Settings',
            array(
                $this,
                'main_settings_section_text'
            ),
            'numerology_calculator'
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

        add_settings_field(
            'lpn1',
            'Life Path Number: 1',
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
            'Life Path Number: 2',
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
            'Life Path Number: 3',
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
            'Life Path Number: 4',
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
            'Life Path Number: 5',
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
            'Life Path Number: 6',
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
            'Life Path Number: 7',
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
            'Life Path Number: 8',
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
            'Life Path Number: 9',
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
            'Life Path Number: 11',
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
            'Life Path Number: 22',
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
            'Life Path Number: 33',
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

    public function main_settings_section_text()
    {
        echo '<p>This is the Numerology Calculator settings page. Please select from the options below.</p>';
        echo '<p>Add the shortcode <code>[numerology-calculator]</code> to a post or page.</p>';
    }


    public function theme_css_select()
    {
        $options = get_option('nmcl_options');

        $theme_css_select = $options['theme_css_select'];
        ?>
        <select id='dropdown-test' name='nmcl_options[theme_css_select]'">
        <option value='none' <?php selected($theme_css_select, 'none'); ?>>None</option>
        <option value='light' <?php selected($theme_css_select, 'light'); ?>>Light</option>
        <option value='dark' <?php selected($theme_css_select, 'dark'); ?>>Dark</option>
        </select>

        <?php
    }

    public function life_path_numbers($args)
    {
        $id = $args['id'];
        $options = get_option('nmcl_options');

        echo "<textarea id='{$id}' name='nmcl_options[{$id}]'>{$options[$id]}</textarea>";
    }

    public function options_validate($input)
    {
//        $newinput['theme_css_select'] = trim($input['theme_css_select']);
//
//        $newinput['dropdown_test'] = $input;
        $newinput = $input;
        return $newinput;
    }

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