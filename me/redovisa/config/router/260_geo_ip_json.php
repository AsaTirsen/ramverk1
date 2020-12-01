<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Ip Controller",
            "mount" => "geo_ip_json_view",
            "handler" => "\Asti\Geoip\GeoipJsonController",
        ],
    ]
];
