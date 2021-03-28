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
            if (isset($resIp["Message"])) {
                $data = [
                    "ErrorMsg" => $resIp["Message"]
                ];
                $page->add("weather/weather_search", $data);
                return $page->render($data);
            } else {
                $resWeather = $weatherService->curlWeatherApi($resIp[0]["Longitude"], $resIp[0]["Latitude"]);
            }
            if (isset($resWeather->Error)) {
                $data = [
                    "ErrorMsg" => $resWeather["Error"]
                ];
                $page->add("weather/weather_search", $data);
                return $page->render($data);
            }
            elseif (isset($ipAdr) && isset($resWeather) && in_array("Prognos", $getParams)) {
                $data = [
                    "long" => $resIp[0]["Longitude"],
                    "lat" => $resIp[0]["Latitude"],
                    "CurrentTemp" => $resWeather[0]["CurrentTemp"],
                    "CurrentFeelsLike" => $resWeather[0]["CurrentFeelsLike"],
                    "CurrentWeather" => $resWeather[0]["CurrentWeather"],
                    "DailyDates" => $resWeather[0]["DailyDates"],
                    "DailyTemperatures" => $resWeather[0]["DailyTemperatures"],
                    "DailyFeelsLike" => $resWeather[0]["DailyFeelsLike"],
                    "DailyDescriptions" => $resWeather[0]["DailyDescriptions"]
                ];
                $page->add("weather/weather_forecast", [$data]);
                return $page->render([$data]);
            } elseif (isset($ipAdr) && isset($resWeather) && in_array("Äldre data", $getParams)) {
                $resWeather = $weatherService->curlOldWeatherApi($resIp[0]["Longitude"], $resIp[0]["Latitude"]);
                $data = [
                    "long" => $resIp[0]["Longitude"],
                    "lat" => $resIp[0]["Latitude"],
                    "Date1" => $resWeather[0]["Date1"],
                    "CurrentTemp1" => $resWeather[0]["CurrentTemp1"],
                    "CurrentFeelsLike1" => $resWeather[0]["CurrentFeelsLike1"],
                    "CurrentWeather1" => $resWeather[0]["CurrentWeather1"],
                    "Date2" => $resWeather[0]["Date2"],
                    "CurrentTemp2" => $resWeather[0]["CurrentTemp2"],
                    "CurrentFeelsLike2" => $resWeather[0]["CurrentFeelsLike2"],
                    "CurrentWeather2" => $resWeather[0]["CurrentWeather2"],
                    "Date3" => $resWeather[0]["Date3"],
                    "CurrentTemp3" => $resWeather[0]["CurrentTemp3"],
                    "CurrentFeelsLike3" => $resWeather[0]["CurrentFeelsLike3"],
                    "CurrentWeather3" => $resWeather[0]["CurrentWeather3"],
                    "Date4" => $resWeather[0]["Date4"],
                    "CurrentTemp4" => $resWeather[0]["CurrentTemp4"],
                    "CurrentFeelsLike4" => $resWeather[0]["CurrentFeelsLike4"],
                    "CurrentWeather4" => $resWeather[0]["CurrentWeather4"],
                    "Date5" => $resWeather[0]["Date5"],
                    "CurrentTemp5" => $resWeather[0]["CurrentTemp5"],
                    "CurrentFeelsLike5" => $resWeather[0]["CurrentFeelsLike5"],
                    "CurrentWeather5" => $resWeather[0]["CurrentWeather5"]
                ];

                $page->add("weather/weather_older", [$data]);
                return $page->render([$data]);
            }
        }
        $data = [
            "ipAdress" => $_SERVER['REMOTE_ADDR'],
        ];
        $page->add("weather/weather_search", $data);
        return $page->render($data);
    }
}
