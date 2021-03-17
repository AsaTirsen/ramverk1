<?php
/**
 * Load the controller class.
 */
return [
    "routes" => [
        [
            "info" => "Weather API Controller",
            "mount" => "api/weather",
            "handler" => "\Asti\Api\WeatherApiController",
        ],
    ]
];
