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

<div id="numerology-calculator-options">

    <?php $post_meta = get_post_meta( get_the_ID() ); ?>
    <table id="numerology-calculator-options-data">
        <tr>
            <td class="title">Title</td>
            <td class="value"><input type="text" value="Insert" /></td>
        </tr>
    </table>

</div><!-- #numerology-calculator-options -->