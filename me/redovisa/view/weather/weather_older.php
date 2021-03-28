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
        var lat=<?php echo $data[0]["lat"]; ?>;
        var long=<?php echo $data[0]["long"]; ?>;
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
            <td><?= $data[0]["CurrentTemp1"]?> C</td>
            <td><?= $data[0]["CurrentFeelsLike1"]?> C</td>
            <td><?= $data[0]["CurrentWeather1"]?></td>
        </tr>
        <tr>
            <td><?= $data[0]["Date2"]?></td>
            <td><?= $data[0]["CurrentTemp2"]?> C</td>
            <td><?= $data[0]["CurrentFeelsLike2"]?> C</td>
            <td><?= $data[0]["CurrentWeather2"]?></td>
        </tr>
        <tr>
            <td><?= $data[0]["Date3"]?></td>
            <td><?= $data[0]["CurrentTemp3"]?> C</td>
            <td><?= $data[0]["CurrentFeelsLike3"]?> C</td>
            <td><?= $data[0]["CurrentWeather3"]?></td>
        </tr>
        <tr>
            <td><?= $data[0]["Date4"]?></td>
            <td><?= $data[0]["CurrentTemp4"]?> C</td>
            <td><?= $data[0]["CurrentFeelsLike4"]?> C</td>
            <td><?= $data[0]["CurrentWeather4"]?></td>
        </tr>
        <tr>
            <td><?= $data[0]["Date5"]?></td>
            <td><?= $data[0]["CurrentTemp5"]?> C</td>
            <td><?= $data[0]["CurrentFeelsLike5"]?> C</td>
            <td><?= $data[0]["CurrentWeather5"]?></td>
        </tr>
    </table>
</article>
