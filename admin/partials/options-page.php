<?php
/**
 * Displays the user interface for the Numerology Calculator Options Page.
 *
 * This is a partial template that is included by the Numerology Calculator
 * Admin class that is used to customize the output of the Numerology Calculator
 * shortcodes.
 *
 * @package    NMCL
 */
?>

<div id="numerology-calculator-options" class="wrap">

    <form method="post" action="options.php">
        <?php settings_fields('nmcl_options'); ?>
        <?php do_settings_sections('numerology_calculator'); ?>

        <?php submit_button( 'Save Options' ); ?>
    </form>

</div><!-- #numerology-calculator-options -->