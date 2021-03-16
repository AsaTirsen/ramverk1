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
            <td><?= $data["HistoricalData"][0]["current"]["temp"]?> C</td>
            <td><?= $data["HistoricalData"][0]["current"]["feels_like"]?> C</td>
            <td><?= $data["HistoricalData"][0]["current"]["weather"][0]["main"]?></td>
        </tr>
        <tr>
            <td><?= date("Y-m-d", $data["HistoricalData"][1]["current"]["dt"])?></td>
            <td><?= $data["HistoricalData"][1]["current"]["temp"]?> C</td>
            <td><?= $data["HistoricalData"][1]["current"]["feels_like"]?> C</td>
            <td><?= $data["HistoricalData"][1]["current"]["weather"][0]["main"]?></td>
        </tr><tr>
            <td><?= date("Y-m-d", $data["HistoricalData"][2]["current"]["dt"])?></td>
            <td><?= $data["HistoricalData"][2]["current"]["temp"]?> C</td>
            <td><?= $data["HistoricalData"][2]["current"]["feels_like"]?> C</td>
            <td><?= $data["HistoricalData"][2]["current"]["weather"][0]["main"]?></td>
        </tr><tr>
            <td><?= date("Y-m-d", $data["HistoricalData"][3]["current"]["dt"])?></td>
            <td><?= $data["HistoricalData"][3]["current"]["temp"]?> C</td>
            <td><?= $data["HistoricalData"][3]["current"]["feels_like"]?> C</td>
            <td><?= $data["HistoricalData"][3]["current"]["weather"][0]["main"]?></td>
        </tr><tr>
            <td><?= date("Y-m-d", $data["HistoricalData"][4]["current"]["dt"])?></td>
            <td><?= $data["HistoricalData"][4]["current"]["temp"]?> C</td>
            <td><?= $data["HistoricalData"][4]["current"]["feels_like"]?> C</td>
            <td><?= $data["HistoricalData"][4]["current"]["weather"][0]["main"]?></td>
        </tr>

    </table>


</article>
