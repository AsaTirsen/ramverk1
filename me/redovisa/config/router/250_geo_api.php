<?php
/**
 * Load the controller class.
 */
return [
    "routes" => [
        [
            "info" => "Geo API Controller",
            "mount" => "api/ipcheck",
            "handler" => "\Asti\Api\GeoApiController",
        ],
    ]
];
