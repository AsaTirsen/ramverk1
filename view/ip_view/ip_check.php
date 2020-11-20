<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
//
?>


<form method="get">
    <fieldset>
        <input type="hidden" name="route" value="ip-check">
        <?= $ipAdress = ""; ?>
        <p>
            <label>Skriv din IP-adress:</label>
            <label>
                <input type="text" name="ipCheck" value="<?= $ipAdress ?>"/>
            </label>
        </p>
        <p>
            <input type="submit" name="doSave" value="Save">
        </p>
    </fieldset>
</form>
<!---->
<?php //if ($data) {
//    ?>
<!--    <article>-->
<!--    <p>--><?//= $data["ipAdress"] ?><!--</p>-->
<!--    </article>-->
<!--    --><?php
//} ?>
