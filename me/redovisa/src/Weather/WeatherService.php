<?php

namespace Asti\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Asti\Geoip\CurlService;

class WeatherService
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

    public function curlWeatherApi($lon, $lat) : object
    {
        $curl = new CurlService();
        $res = $curl->getDataThroughCurl($this->getUrl() . "?" . "lat=" . $lat . "&lon=" . $lon . "&units=metric" . "&lang=sv" . "&appid=" . $this->getKey());
        if (isset($res["cod"])) {
            return (object) [
                "Error" => "Platsangivelse är fel"
            ];
        } else {
            return (object)[
                "Current" => $res["current"],
                "Daily" => $res["daily"],
            ];
        }
    }
    public function curlOldWeatherApi($lon, $lat) : object
    {
        $curl = new CurlService();
        $dateArray = [];
        $currentTime = time();
        for ($x = 0; $x <= 4; $x++) {
            array_push($dateArray, $currentTime -= 86400);
        }
        $res = $curl->getMultipleCurls($this->getUrl() . "/timemachine?" . "lat=" . $lat . "&lon=" . $lon . "&units=metric" . "&lang=sv" . "&dt=", $dateArray,  "&appid=" . $this->getKey());
        if (isset($res["cod"])) {
            return (object) [
                "Error" => "Platsangivelse är fel. Försök igen"
            ];
        }
        return (object)[
            "DailyHistory" => $res,
        ];
    }
}
