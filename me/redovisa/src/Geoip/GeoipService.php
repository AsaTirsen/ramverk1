<?php

namespace Asti\Geoip;

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

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getUrl(): string
    {
        return $this->url;
    }




    public function curlIpApi($ipAdr): array
    {
        $curl = new CurlService();
        if ($ipAdr!= "") {
            $res = $curl->getDataThroughCurl($this->getUrl() . $ipAdr . "?access_key=" . $this->getKey());

            if ($res["type"] == null) {
                $json = [
                    "Message" => "IP-adressen är fel. Försök igen!"
                ];
                return $json;
            }
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
        else {
            $json = [
                "Message" => "IP-adressen är tom. Försök igen"
            ];
            return $json;
        }
    }
}
