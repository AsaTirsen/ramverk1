<?php

namespace Asti\Weather;

use Asti\Mock\ipResMock;
use Asti\Geoip\GeoipService;


class GeoIpServiceMock extends GeoipService
{
    public function curlIpApi($ipAdr): array
    {
        $mockIp = new ipResMock();
        error_log("curlIpApi " . $ipAdr);
        $res = $mockIp->getDataThroughCurl();
        $json = [
            "Type" => $res["type"],
            "Valid" => $res["type"] ? "ipv4" || "ipv6" : "not valid",
            "UserInput" => $res["ip"],
            "Latitude" => $res["latitude"],
            "Longitude" => $res["longitude"],
            "City" => $res["city"],
            "Country" => $res["country_name"],
        ];
        return [$json];
    }
}
