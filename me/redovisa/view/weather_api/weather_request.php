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
        <h2>I det här API:et kan du skriva in en IP-adress och få en 7-dagars väderprognos alternativt 5 dagars
            historiskt data.</h2>
        <h3>Metod 1: Använd formuläret nedan för att skriva in ditt ip-nummer</h3>
        <h3>Metod 2: Använd en klient t.ex. Postman och gör en POST. Använd /api/weather/weather med
            key 1 ipCheck och value 1 ditt
            IP-nummer samt key 2 forecast eller historic med value Prognos eller Äldre data</h3>
        <p>Exempel: http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/weather/weather</p>
        <table>
            <tr>
                <th>key</th>
                <th>value</th>
            </tr>
            <tr>
                <th>ipCheck</th>
                <th>134.201.250.155</th>
            </tr>
            <tr>
                <th>forecast</th>
                <th>Prognos</th>
            </tr>
        </table>


    </div>
    <form method="post" action="api/weather/weather">
        <fieldset>
            <p>
                <label>Skriv din IP-adress:</label>
                <label>
                    <input type="text" name="ipCheck" value="<?= $ipAdress ?>"/>
                </label>
            </p>
            <p>
                <input type="submit" name="forecast" value="Prognos">
                <input type="submit" name="historic" value="Äldre data">
            </p>
        </fieldset>
    </form>
            <h2>Testroutes</h2>
    <form method="post" action="api/weather/weather">
        <fieldset>
            <p>
                <label><input type="hidden" name="ipCheck" value="2607:f8b0:4004:80a::200e">Testa IPv6</label>
                <input type="submit" name="forecast" value="Prognos">
                <input type="submit" name="forecast" value="Äldre data">
            </p>
        </fieldset>
    </form>
    <form method="post" action="api/weather/weather">
        <fieldset>
            <p>
                <label><input type="hidden" name="ipCheck" value="172.217.14.196">Testa IPv4</label>
                <input type="submit" name="forecast" value="Prognos">
                <input type="submit" name="forecast" value="Äldre data">
            </p>
        </fieldset>
    </form>
    <form method="post" action="api/weather/weather">
        <fieldset>
            <p>
                <label><input type="hidden" name="ipCheck" value="18.184.114">Testa ogiltig</label>
                <input type="submit" name="forecast" value="Prognos">
                <input type="submit" name="forecast" value="Äldre data">
            </p>
        </fieldset>
    </form>
</article>
