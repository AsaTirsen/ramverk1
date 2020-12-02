<?php

namespace Asti\Geoip;


class GeoipModel
{
    /*
     * recieves data
     * decodes json
     * recodes json with slimmer data
     * returns object to GeoIpCpntroller with di
     *
     */

    public function check($ipAdr) : object
    {
            $service = new GeoipService();
            $res = $service->curlIpApi($ipAdr);
        return (object)[
            "Type" => $res["type"],
            "Valid" => $res["type"] ? "ipv4" || "ipv6" : "not valid",
            "UserInput" => $res["ip"],
            "Latitude" => $res["latitude"],
            "Longitude" => $res["longitude"],
            "City" => $res["city"],
            "Country" => $res["country_name"],
        ];
    }
}
