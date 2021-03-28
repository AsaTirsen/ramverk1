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
            let lat=<?php echo $data[0]["lat"]; ?>;
            let long=<?php echo $data[0]["long"]; ?>;
            let map = L.map('map', {
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
            <td><?= $data[0]["CurrentTemp"]?> C</td>
            <td><?= $data[0]["CurrentFeelsLike"] ?> C</td>
            <td><?= $data[0]["CurrentWeather"]?></td>
        </tr>
        <tr>
            <td>Imorgon</td>
            <td><?= array_values($data[0]["DailyTemperatures"])[1]?> C</td>
            <td><?= array_values($data[0]["DailyFeelsLike"])[1]?> C</td>
            <td><?= array_values($data[0]["DailyDescriptions"])[1]?></td>
        </tr>
        <tr>
            <td><?= array_values($data[0]["DailyDates"])[2]?></td>
            <td><?= array_values($data[0]["DailyTemperatures"])[2]?> C</td>
            <td><?= array_values($data[0]["DailyFeelsLike"])[2]?> C</td>
            <td><?= array_values($data[0]["DailyDescriptions"])[2]?></td>
        </tr>
        <tr>
            <td><?= array_values($data[0]["DailyDates"])[3]?></td>
            <td><?= array_values($data[0]["DailyTemperatures"])[3]?> C</td>
            <td><?= array_values($data[0]["DailyFeelsLike"])[3]?> C</td>
            <td><?= array_values($data[0]["DailyDescriptions"])[3]?></td>
        </tr>
        <tr>
            <td><?= array_values($data[0]["DailyDates"])[4]?></td>
            <td><?= array_values($data[0]["DailyTemperatures"])[4]?> C</td>
            <td><?= array_values($data[0]["DailyFeelsLike"])[4]?> C</td>
            <td><?= array_values($data[0]["DailyDescriptions"])[4]?></td>
        </tr>
        <tr>
            <td><?= array_values($data[0]["DailyDates"])[5]?></td>
            <td><?= array_values($data[0]["DailyTemperatures"])[5]?> C</td>
            <td><?= array_values($data[0]["DailyFeelsLike"])[5]?> C</td>
            <td><?= array_values($data[0]["DailyDescriptions"])[5]?></td>
        </tr>
        <tr>
            <td><?= array_values($data[0]["DailyDates"])[6]?></td>
            <td><?= array_values($data[0]["DailyTemperatures"])[6]?> C</td>
            <td><?= array_values($data[0]["DailyFeelsLike"])[6]?> C</td>
            <td><?= array_values($data[0]["DailyDescriptions"])[6]?></td>
        </tr>
        <tr>
            <td><?= array_values($data[0]["DailyDates"])[7]?></td>
            <td><?= array_values($data[0]["DailyTemperatures"])[7]?> C</td>
            <td><?= array_values($data[0]["DailyFeelsLike"])[7]?> C</td>
            <td><?= array_values($data[0]["DailyDescriptions"])[7]?></td>
        </tr>
    </table>


</article>
