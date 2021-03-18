<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                ],
            ],
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "Styleväljare",
            "url" => "style",
            "title" => "Välj stylesheet.",
        ],
        [
            "text" => "Verktyg",
            "url" => "verktyg",
            "title" => "Verktyg och möjligheter för utveckling.",
        ],
        [
            "text" => "IP-check",
            "url" => "ip_view",
            "title" => "Kontrollera en IP-adress",
        ],
        [
            "text" => "IP-JSON-check",
            "url" => "ip_json_view",
            "title" => "Kontrollera en IP-adress",
        ],
        [
            "text" => "GEO-IP-JSON-check",
            "url" => "geo_ip_json_view",
            "title" => "Kontrollera en IP-adress",
        ],
        [
            "text" => "GEO-IP-check",
            "url" => "geo_ip_view",
            "title" => "Kontrollera en IP-adress",
        ],
        [
            "text" => "Väder",
            "url" => "weather",
            "title" => "Få väderprognos",
        ],
        [
            "text" => "VäderAPI",
            "url" => "weather_api",
            "title" => "Få väderprognos",
        ],
    ],
];
