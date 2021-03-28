<?php
namespace Asti\Mock;

use Anax\DI\DIFactoryConfig;
use Anax\Request\Request;
use Asti\Geoip\GeoipService;
use PHPUnit\Framework\TestCase;

class ipResMock
{
    public function getDataThroughCurl() : array
    {
        $data = [];
        $data[] = <<<EOD
 {
        "Type": "ipv4",
        "Valid": true,
        "UserInput": "172.217.14.196",
        "Latitude": 47.60150146484375,
        "Longitude": -122.3303985595703125,
        "City": "Seattle",
        "Country": "United States"
    }
EOD;
        return $data;
    }
}

