<?php
/**
 * Load the controller class.
 */
return [
    "routes" => [
        [
            "info" => "Geo API Controller",
            "mount" => "api/geocheck",
            "handler" => "\Asti\Api\GeoController",
        ],
    ]
];
