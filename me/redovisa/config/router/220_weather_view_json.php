<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Ip Controller",
            "mount" => "weather_api",
            "handler" => "\Asti\Weather\WeatherRequestController",
        ],
    ]
];
