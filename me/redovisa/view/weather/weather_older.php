<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

?><article>
    <table>
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
