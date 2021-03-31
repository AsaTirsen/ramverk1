<?php
/**
 * Configuration file for DI container.
 */

return [

    // Services to add to the container.
    "services" => [
        "weather" => [
            // Is the service shared, true or false
            // Optional, default is true
            "shared" => true,

            // Callback executed when service is activated
            // Create the service, load its configuration (if any)
            // and set it up.
            "callback" => function () {
                $weatherService = new \Asti\Weather\WeatherService();

                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("weather.php");
                $settings = $config["config"] ?? null;

                if ($settings["url"] ?? null) {
                    $weatherService->setUrl($settings["url"]);
                }
                if ($settings["API-key"] ?? null) {
                    $weatherService->setKey($settings["API-key"]);
                }

                return $weatherService;
            }
        ],
    ],
];
