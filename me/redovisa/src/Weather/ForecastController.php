<?php

namespace Asti\Weather;

use Asti\Geoip\GeoipService;
use Asti\Ipcheck\HelperFunctions;
use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class ForecastController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction(): object
    {
        $help = new HelperFunctions();
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $getParams = $request->getGet();
        $geoipService = $this->di->get("geoip");
        $weatherService = $this->di->get("weather");
        $resIp = null;
        $resWeather = null;
        if ($getParams) {
            $ipAdr = $getParams["ipCheck"];
            $resIp = $geoipService->curlIpApi($ipAdr);
            if (isset($resIp->Message)) {
                $data = [
                    "ErrorMsg" => "$resIp->Message"
                ];
                $page->add("weather/weather_search", $data);
                return $page->render($data);
            } else {
                $resWeather = $weatherService->curlWeatherApi($resIp->Longitude, $resIp->Latitude);
            }
            if (isset($resWeather->Error)) {
                $data = [
                    "ErrorMsg" => "$resWeather->Error"
                ];
                $page->add("weather/weather_search", $data);
                return $page->render($data);
            }
            elseif (isset($ipAdr) && isset($resWeather) && $getParams["type"] == "Prognos") {
                $data = [
                    "long" => $resIp->Longitude,
                    "lat" => $resIp->Latitude,
                    "CurrentTemp" => $resWeather->Current["temp"],
                    "CurrentFeelsLike" => $resWeather->Current["feels_like"],
                    "CurrentWeather" => $resWeather->Current["weather"][0]["description"],
                    "DailyDates" => $help->loopThroughDate($resWeather->Daily),
                    "DailyTemperatures" => $help->loopThroughTemp($resWeather->Daily, "temp", "day"),
                    "DailyFeelsLike" => $help->loopThroughTemp($resWeather->Daily, "feels_like", "day"),
                    "DailyDescriptions" => $help->loopThroughDesc($resWeather->Daily, "weather", "description")
                ];
                $page->add("weather/weather_forecast", $data);
                return $page->render($data);
            } elseif (isset($ipAdr) && isset($resWeather) && $getParams["type"] == "Äldre data") {
                $resWeather = $weatherService->curlOldWeatherApi($resIp->Longitude, $resIp->Latitude);
                $data = [
                    "long" => $resIp->Longitude,
                    "lat" => $resIp->Latitude,
                    "HistoricalData" => $resWeather->DailyHistory,
                ];

                $page->add("weather/weather_older", $data);
                return $page->render($data);
            }
        }
        $data = [
            "ipAdress" => $_SERVER['REMOTE_ADDR'],
        ];
        $page->add("weather/weather_search", $data);
        return $page->render($data);
    }
}
//
//}$help = new HelperFunctions();
//$page = $this->di->get("page");
//$request = $this->di->get("request");
//$getParams = $request->getGet();
//$geoipService = $this->di->get("geoip");
//$weatherService = $this->di->get("weather");
//$ipAdr = null;
//if ($getParams) {
//    if ($getParams["ipCheck"] = "" && $getParams["lat"] != "" && $getParams["long"] != "") {
//        $lat = $getParams["lat"];
//        $long = $getParams["long"];
//    } else {
//        $ipAdr = $getParams["ipCheck"];
//        $resIp = $geoipService->curlIpApi($ipAdr);
//        $resWeather = $weatherService->curlWeatherApi($resIp->Longitude, $resIp->Latitude);
//    }
//    error_log($lat);
//    error_log($long);
//    if ($getParams["type"] == "Prognos") {
//        $data = [
//            "long" =>  $resIp->Longitude || $long,
//            "lat" => $resIp->Latitude || $lat,
//            "CurrentTemp" => $resWeather->Current["temp"],
//            "CurrentFeelsLike" => $resWeather->Current["feels_like"],
//            "CurrentWeather" => $resWeather->Current["weather"][0]["description"],
//            "DailyDates" => $help->loopThroughDate($resWeather->Daily),
//            "DailyTemperatures" => $help->loopThroughTemp($resWeather->Daily, "temp", "day"),
//            "DailyFeelsLike" => $help->loopThroughTemp($resWeather->Daily, "feels_like", "day"),
//            "DailyDescriptions" => $help->loopThroughDesc($resWeather->Daily, "weather", "description")
//        ];
//        error_log($data["long"]);
//        error_log($data["lat"]);