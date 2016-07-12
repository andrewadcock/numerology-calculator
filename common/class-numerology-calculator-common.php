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

    }

    /**
     * Enqueues the style sheet responsible for styling the contents of the
     * shortcode output.
     */
    public function enqueue_styles()
    {

        wp_enqueue_style(
            'numerology-calculator-common',
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

}
