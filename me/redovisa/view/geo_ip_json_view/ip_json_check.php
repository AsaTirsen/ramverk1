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
        <h2>I det här API:et kan du testa en IP-adress för att se om den är giltig och vilket domännamn den
            tillhör.</h2>
        <h3>Metod 1: Använd formuläret nedan för att skriva in ditt ip-nummer</h3>
        <h3>Metod 2: Använd en klient t.ex. Postman och gör en POST. Använd /api/geocheck/check med key ipCheck och value ditt
            IP-nummer.</h3>
        <p>Exempel:
            http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/geocheck/check
        <p>key = ipCheck</p>
        <p>value = ip-nummer</p>
        </p>

    </div>
    <form method="post" action="api/geocheck/check">
        <fieldset>
            <p>
                <label>Skriv din IP-adress:</label>
                <label>
                    <input type="text" name="ipCheck" value="<?= $ipAdress ?>"/>
                </label>
            </p>
            <p>
                <input type="submit" name="doSave" value="Spara">
            </p>
            <h2>Testroutes</h2>
            <p>
                <button type="submit" name="ipCheck" value="2607:f8b0:4004:80a::200e">Testa IPv6</button>
            </p>
            <p>
                <button type="submit" name="ipCheck" value="172.217.14.196">Testa IPv4</button>
            </p>
            <p>
                <button type="submit" name="ipCheck" value="18.184.114">Testa ogiltig</button>
            </p>
        </fieldset>
    </form>
</article>
