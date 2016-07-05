<?php
/*
 * Plugin Name:       Numerology Calculator
 * Plugin URI:        https://github.com/andrewadcock/numerology-calculator
 * Description:       Calculate and display Numerology "Life Path Number"
 * Version:           0.0.1
 * Author:            Andrew Adcock
 * Author URI:        http://andrewadcock.com
 * Text Domain:       numerology-calculator-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-numerology-calculator.php';

function run_numerology_calculator() {
    $nmcl = new Numerology_Calculator();
    $nmcl->run();
}

run_numerology_calculator();