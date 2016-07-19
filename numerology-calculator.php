<?php
/**
 * The file responsible for starting the Numerology Calculator plugin
 *
 * The Numerology Calculator uses a simple form and returns your Life
 * Path number and associated description. This file includes the
 * necessary dependencies and starts the plugin.
 *
 * @package NMCL
 *
 * @wordpress-plugin
 * Plugin Name:       Numerology Calculator
 * Plugin URI:        https://github.com/andrewadcock/numerology-calculator
 * Description:       Calculate and display Numerology "Life Path Number"
 * Version:           0.0.3
 * Author:            Andrew Adcock
 * Author URI:        http://andrewadcock.com
 * Text Domain:       numerology-calculator
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly then abort
if (!defined('WPINC')) {
    die;
}

/**
 * Define the text-domain
 */
if (!defined('NMCL_TEXT_DOMAIN')) {
    define('NMCL_TEXT_DOMAIN', 'numerology-calculator');
}

/**
 * Load the plugin text domain
 */

function plugin_textdomain()
{
    load_plugin_textdomain('numerology-calculator', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action( 'plugins_loaded', 'plugin_textdomain' );

/**
 * Include the core class responsible for loading all plugin components
 */
require_once plugin_dir_path(__FILE__) . 'includes/class-numerology-calculator.php';

/**
 * Instantiates the Numerology Calculator class and then
 * calls its run method officially starting up the plugin.
 */
function run_numerology_calculator()
{
    $nmcl = new Numerology_Calculator();
    $nmcl->run();
}

// Call the function to begin execution of the plugin
run_numerology_calculator();