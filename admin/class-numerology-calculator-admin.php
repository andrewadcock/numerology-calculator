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
class Numerology_Calculator_Admin {

    /**
     * A reference to the version of the plugin that is passed to this class from the caller.
     *
     * @access private
     * @var    string    $version    The current version of the plugin.
     */
    private $version;

    /**
     * Initializes this class and stores the current version of this plugin.
     *
     * @param    string    $version    The current version of this plugin.
     */
    public function __construct( $version ) {
        $this->version = $version;
    }

    /**
     * Enqueues the style sheet responsible for styling the contents of the
     * options page.
     */
    public function enqueue_styles() {

        wp_enqueue_style(
            'numerology-calculator-admin',
            plugin_dir_url( __FILE__ ) . 'css/numerology-calculator-admin.css',
            array(),
            $this->version,
            FALSE
        );
    }

    /**
     * Registers the options page that will display all plugin options.
     */
    public function admin_menu() {
        add_options_page(
            'Numerology Options',
            'Numerology Options',
            'manage_options',
            'numerology-calculator-options',
            array(
                $this,
                'settings_page'
            )
        );
    }

    /**
     * Requires the file used to display the user interface of plugin
     * options page.
     */
    public function  settings_page() {
        echo '<h1>Numerology Calculator Options</h1>';
        require_once plugin_dir_path(__FILE__) . 'partials/options-page.php';
    }

}