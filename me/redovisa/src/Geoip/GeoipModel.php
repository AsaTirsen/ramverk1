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
            "Valid" => $res["type"] = "ipv4" || "ipv6",
            "Type" => $res["type"],
            "UserInput" => $res["ip"],
            "Country" => $res["country_code"],
        ];

//        $isIPv6 = filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
//        $isIPv4 = filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
//        if ($isIPv6 || $isIPv4) {
//            $hostname = gethostbyaddr($ipAdress);
//        } else {
//            $hostname = "false";
//        }
//        return (object)[
//            "Valid" => $isIPv4 || $isIPv6,
//            "IPv4" => $isIPv4,
//            "IPv6" => $isIPv6,
//            "UserInput" => $ipAdress,
//            "DomainName" => $hostname,
//
//        ];
//    }
    }
}
