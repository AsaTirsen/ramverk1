<?php

namespace Asti\Weather;

use Asti\Geoip\CurlService;
use Asti\Ipcheck\HelperFunctions;

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



    public function curlWeatherApi($lon, $lat) : array
    {
        $curl = new CurlService();
        $help = new HelperFunctions();
        $res = $curl->getDataThroughCurl($this->getUrl() . "?" . "lat=" . $lat . "&lon=" . $lon . "&units=metric" . "&lang=sv" . "&appid=" . $this->getKey());
        if (isset($res["cod"])) {
            return [
                "Error" => "Platsangivelse är fel"
            ];
        } else {
            $json = [
                "CurrentTemp" => substr($res["current"]["temp"], 0, 5),
                "CurrentFeelsLike" => substr($res["current"]["feels_like"], 0, 5),
                "CurrentWeather" => $res["current"]["weather"][0]["description"],
                "DailyDates" => $help->loopThroughDate($res["daily"]),
                "DailyTemperatures" => $help->loopThroughTemp($res["daily"], "temp", "day"),
                "DailyFeelsLike" => $help->loopThroughTemp($res["daily"], "feels_like", "day"),
                "DailyDescriptions" => $help->loopThroughDesc($res["daily"], "weather", "description")
            ];
            return [$json];
        }
    }

    public function curlOldWeatherApi($lon, $lat) : array
    {
        $curl = new CurlService();
        $dateArray = [];
        $currentTime = time();
        for ($x = 0; $x <= 4; $x++) {
            array_push($dateArray, $currentTime -= 86400);
        }
        $res = $curl->getMultipleCurls($this->getUrl() . "/timemachine?" . "lat=" . $lat . "&lon=" . $lon . "&units=metric" . "&lang=sv" . "&dt=", $dateArray,  "&appid=" . $this->getKey());
        if (isset($res["cod"])) {
            return [
                "Error" => "Väder kan inte ges för positionen. Försök igen"
            ];
        }
        $json =  [
            "Date1" => date("Y-m-d", $res[0]["current"]["dt"]),
            "CurrentTemp1" => substr($res[0]["current"]["temp"], 0, 5),
            "CurrentFeelsLike1" => substr($res[0]["current"]["feels_like"], 0, 5),
            "CurrentWeather1" => $res[0]["current"]["weather"][0]["main"],
            "Date2" => date("Y-m-d", $res[1]["current"]["dt"]),
            "CurrentTemp2" => substr($res[1]["current"]["temp"], 0, 5),
            "CurrentFeelsLike2" =>  substr($res[1]["current"]["feels_like"], 0, 5),
            "CurrentWeather2" => $res[1]["current"]["weather"][0]["main"],
            "Date3" => date("Y-m-d", $res[2]["current"]["dt"]),
            "CurrentTemp3" => substr($res[2]["current"]["temp"], 0, 5),
            "CurrentFeelsLike3" =>  substr($res[2]["current"]["feels_like"], 0, 5),
            "CurrentWeather3" => $res[2]["current"]["weather"][0]["main"],
            "Date4" => date("Y-m-d", $res[3]["current"]["dt"]),
            "CurrentTemp4" => substr($res[3]["current"]["temp"], 0, 5),
            "CurrentFeelsLike4" =>  substr($res[3]["current"]["feels_like"], 0, 5),
            "CurrentWeather4" => $res[3]["current"]["weather"][0]["main"],
            "Date5" => date("Y-m-d", $res[4]["current"]["dt"]),
            "CurrentTemp5" => substr($res[4]["current"]["temp"], 0, 5),
            "CurrentFeelsLike5" =>  substr($res[4]["current"]["feels_like"], 0, 5),
            "CurrentWeather5" => $res[4]["current"]["weather"][0]["main"]
        ];
        return [$json];
    }
}
