<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
//
if (isset($data["ErrorMsg"])) : ?>
    <p> <?= $data["ErrorMsg"];?> </p>
    <form method="get">
        <fieldset>
            <input type="hidden" name="route" value="check">
            <p>
                <label>Skriv IP-adress för stället du vill ha väder för:</label>
                <label>
                    <input type="text" name="ipCheck" value="<?= $ipAdress?>"/>
                </label>
            </p>
            <p>
                <input type="submit" name="type" value="Prognos">
                <input type="submit" name="type" value="Äldre data">

            </p>
        </fieldset>
    </form>
<?php else : ?>

<form method="get">
    <fieldset>
        <input type="hidden" name="route" value="check">
        <p>
            <label>Skriv IP-adress för stället du vill ha väder för:</label>
            <label>
                <input type="text" name="ipCheck" value="<?= $ipAdress?>"/>
            </label>
        </p>
        <p>
            <input type="submit" name="type" value="Prognos">
            <input type="submit" name="type" value="Äldre data">

        </p>
    </fieldset>
</form>
<?php endif; ?>
