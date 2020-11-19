<?php

namespace Asti\Api;

class IpCheck
{
    public function check(string $ip)
    {
        $isIPv6 = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
        $isIPv4 = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        if ($isIPv6 || $isIPv4) {
            $hostname = gethostbyaddr($ip);
        } else {
            $hostname = "false";
        }
        return $json = (object)[
            "Valid" => $isIPv4 || $isIPv6,
            "IPv4" => $isIPv4,
            "IPv6" => $isIPv6,
            "UserInput" => $ip,
            "DomainName" => $hostname,
        ];
    }
}
