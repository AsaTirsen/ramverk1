<?php

namespace Asti\Api;

class IpCheck
{
    public function check(string $ipAdress)
    {
        $isIPv6 = filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
        $isIPv4 = filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        if ($isIPv6 || $isIPv4) {
            $hostname = gethostbyaddr($ipAdress);
        } else {
            $hostname = "false";
        }
        return $json = (object)[
            "Valid" => $isIPv4 || $isIPv6,
            "IPv4" => $isIPv4,
            "IPv6" => $isIPv6,
            "UserInput" => $ipAdress,
            "DomainName" => $hostname,
        ];
    }
}
