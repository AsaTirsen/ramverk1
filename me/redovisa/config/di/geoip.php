<?php
/**
 * Configuration file for DI container.
 */

use Asti\Geoip\GeoipService;

return [

    // Services to add to the container.
    "services" => [
        "mumincfg" => [
            // Is the service shared, true or false
            // Optional, default is true
            "shared" => true,

            // Is the service activated by default, true or false
            // Optional, default is false
            "active" => false,

            // Callback executed when service is activated
            // Create the service, load its configuration (if any)
            // and set it up.
            "callback" => function () {
                $geoipService = new GeoipService();

                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("geoip.php");
                $settings = $config["config"] ?? null;

                if ($settings["url"] ?? null) {
                    $geoipService->setUrl($settings["url"]);
                }
                if ($settings["API-key"] ?? null) {
                    $geoipService->setKey($settings["API-key"]);
                }

                return $geoipService;
            }
        ],
    ],
];
