<?php
/**
 * Load the controller class.
 */
return [
    "routes" => [
        [
            "info" => "Weather Controller",
            "mount" => "weather",
            "handler" => "\Asti\Weather\ForecastController",
        ],
    ]
];
