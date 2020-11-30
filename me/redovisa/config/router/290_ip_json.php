<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Rest API Controller",
            "mount" => "api/ipcheck",
            "handler" => "\Asti\Api\RestApiController",
        ],
    ]
];
