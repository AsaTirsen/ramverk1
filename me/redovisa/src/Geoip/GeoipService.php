<?php

namespace Asti\Geoip;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Asti\Geoip\CurlService;

class GeoipService
{


    /*
     *
     * curls api, get_file_contents
     * sends response to model
     *
     */

    private $key = null;
    private $url = null;

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function setUrl($url) : void
    {
        $this->url = $url;
    }

    public function getKey() : string
    {
        return $this->key;
    }

    public function getUrl() : string
    {
        return $this->url;
    }

    public function curlIpApi($ipAdr) : object
    {
        $curl = new CurlService();
        $res = $curl->getDataThroughCurl($this->getUrl() . $ipAdr . "?access_key=" . $this->getKey());
        if ($res["type"] == null) {
            return (object) [
                "Message" => "Ipadressen är fel. Försök igen"
            ];
        }
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
