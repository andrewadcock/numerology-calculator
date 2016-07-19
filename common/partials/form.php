<form method="post" action="" id="nmclFormMain">
    <table>

        <tr>
            <td>
                <label for="day"><?php _e('Day', NMCL_TEXT_DOMAIN); ?></label>
            </td>
            <td>
                <select name="day">
                    <?php for ($x = 1; $x <= 31; $x++) {
                        ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="month"><?php _e('Month', NMCL_TEXT_DOMAIN); ?></label>
            </td>
            <td>
                <select name="month">
                    <option value="1"><?php _e('January', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="2"><?php _e('February', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="3"><?php _e('March', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="4"><?php _e('April', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="5"><?php _e('May', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="6"><?php _e('June', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="7"><?php _e('July', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="8"><?php _e('August', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="9"><?php _e('September', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="10"><?php _e('October', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="11"><?php _e('November', NMCL_TEXT_DOMAIN); ?></option>
                    <option value="12"><?php _e('December', NMCL_TEXT_DOMAIN); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="year"><?php _e('Year', NMCL_TEXT_DOMAIN); ?></label>
            </td>
            <td>
                <select name="year">
                    <?php
                    $current_year = idate('Y');
                    for ($x = $current_year; $x >= 1900; $x--) {
                        ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="action" value="getNumber"/>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" /></td>
        </tr>
    </table>
</form>

<div id="nmcl-return"></div>