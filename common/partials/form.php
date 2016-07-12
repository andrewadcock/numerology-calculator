<form method="post" action="">
    <table>
        <tr>
            <td>
                <label for="month">Month</label>
            </td>
            <td>
                <select name="month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="day">Day</label>
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
                <label for="year">Year</label>
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