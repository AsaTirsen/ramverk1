<?php
/**
 * Load the ip controller as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Geo Ip Controller",
            "mount" => "geo_ip_view",
            "handler" => "\Asti\Geoip\GeoipController",
        ],
    ]
];
