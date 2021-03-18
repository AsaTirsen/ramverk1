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

    <table class="table">
        <h1>5 dagars historiskt väderdata</h1>
        <tr>
            <th>Dag</th>
            <th>Temperatur C</th>
            <th>Känns som C</th>
            <th>Beskrivning</th>
        </tr>
        <tr>
            <td>Igår</td>
            <td><?= $data["CurrentTemp1"]?> C</td>
            <td><?= $data["CurrentFeelsLike1"]?> C</td>
            <td><?= $data["CurrentWeather1"]?></td>
        </tr>
        <tr>
            <td><?= $data["Date2"]?></td>
            <td><?= $data["CurrentTemp2"]?> C</td>
            <td><?= $data["CurrentFeelsLike2"]?> C</td>
            <td><?= $data["CurrentWeather2"]?></td>
        </tr>
        <tr>
            <td><?= $data["Date3"]?></td>
            <td><?= $data["CurrentTemp3"]?> C</td>
            <td><?= $data["CurrentFeelsLike3"]?> C</td>
            <td><?= $data["CurrentWeather3"]?></td>
        </tr>
        <tr>
            <td><?= $data["Date4"]?></td>
            <td><?= $data["CurrentTemp4"]?> C</td>
            <td><?= $data["CurrentFeelsLike4"]?> C</td>
            <td><?= $data["CurrentWeather4"]?></td>
        </tr>
        <tr>
            <td><?= $data["Date5"]?></td>
            <td><?= $data["CurrentTemp5"]?> C</td>
            <td><?= $data["CurrentFeelsLike5"]?> C</td>
            <td><?= $data["CurrentWeather5"]?></td>
        </tr>

    </table>


</article>
