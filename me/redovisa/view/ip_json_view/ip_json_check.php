<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
//
?>
<article>
<div>
    <h2>I det här API:et kan du testa en IP-adress för att se om den är giltig och vilket domännamn den tillhör.</h2>
    <h3>Metod 1: Använd formuläret nedan för att skriva in ditt ip-nummer</h3>
    <h3>Metod 2: Använd en klient t.ex. Postman och gör en POST. Använd /api/ipcheck med key ipCheck och value ditt IP-nummer.</h3>
    <p>Exempel:
        http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/ipcheck?ipCheck=127.0.0.1
    </p>

</div>
<form method="post" action="api/ipcheck/check">
    <fieldset>
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

    <p><a href="http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/ipcheck?ipCheck=684D:1111:222:3333:4444:5555:6:77">Testa IPv6</a></p>
    <p><a href="http://www.student.bth.se/~asti18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/api/ipcheck?ipCheck=18.184.114.21">Testa IPv4</a></p>
    <p><a href="http://www.student.bth.se/~asti18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/api/ipcheck?ipCheck=18.184.114.">Testa ogiltig</a></p>
</article>
