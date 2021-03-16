<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

?><article>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css">
        <script src='https://unpkg.com/leaflet@1.3.3/dist/leaflet.js'></script>
        <div id="map"></div>
        <style>
            #map{ height: 200px }
        </style>
        <script type="text/javascript">
            var lat=<?php echo $data["lat"]; ?>;
            var long=<?php echo $data["long"]; ?>;
            var map = L.map('map', {
                center: [lat, long],
                zoom: 13
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([lat, long]).addTo(map)
        </script>
    <p>Kartan görs med hjälp av Open Street Maps och Leaflet</p>


        <h1>7-dagars prognos</h1>
    <table class="table">

    <tr>
            <th>Dag</th>
            <th>Temperatur C</th>
            <th>Känns som C</th>
            <th>Beskrivning</th>
        </tr>
        <tr>
            <td>Just nu</td>
            <td><?= $data["CurrentTemp"]?> C</td>
            <td><?= $data["CurrentFeelsLike"] ?> C</td>
            <td><?= $data["CurrentWeather"]?></td>
        </tr>
        <tr>
            <td>Imorgon</td>
            <td><?= array_values($data["DailyTemperatures"])[1]?> C</td>
            <td><?= array_values($data["DailyFeelsLike"])[1]?> C</td>
            <td><?= array_values($data["DailyDescriptions"])[1]?></td>
        </tr>
        <tr>
            <td><?= array_values($data["DailyDates"])[2]?></td>
            <td><?= array_values($data["DailyTemperatures"])[2]?> C</td>
            <td><?= array_values($data["DailyFeelsLike"])[2]?> C</td>
            <td><?= array_values($data["DailyDescriptions"])[2]?></td>
        </tr>
        <tr>
            <td><?= array_values($data["DailyDates"])[3]?></td>
            <td><?= array_values($data["DailyTemperatures"])[3]?> C</td>
            <td><?= array_values($data["DailyFeelsLike"])[3]?> C</td>
            <td><?= array_values($data["DailyDescriptions"])[3]?></td>
        </tr>
        <tr>
            <td><?= array_values($data["DailyDates"])[4]?></td>
            <td><?= array_values($data["DailyTemperatures"])[4]?> C</td>
            <td><?= array_values($data["DailyFeelsLike"])[4]?> C</td>
            <td><?= array_values($data["DailyDescriptions"])[4]?></td>
        </tr>
        <tr>
            <td><?= array_values($data["DailyDates"])[5]?></td>
            <td><?= array_values($data["DailyTemperatures"])[5]?> C</td>
            <td><?= array_values($data["DailyFeelsLike"])[5]?> C</td>
            <td><?= array_values($data["DailyDescriptions"])[5]?></td>
        </tr>
        <tr>
            <td><?= array_values($data["DailyDates"])[6]?></td>
            <td><?= array_values($data["DailyTemperatures"])[6]?> C</td>
            <td><?= array_values($data["DailyFeelsLike"])[6]?> C</td>
            <td><?= array_values($data["DailyDescriptions"])[6]?></td>
        </tr>
        <tr>
            <td><?= array_values($data["DailyDates"])[7]?></td>
            <td><?= array_values($data["DailyTemperatures"])[7]?> C</td>
            <td><?= array_values($data["DailyFeelsLike"])[7]?> C</td>
            <td><?= array_values($data["DailyDescriptions"])[7]?></td>
        </tr>
    </table>


</article>
