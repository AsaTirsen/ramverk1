<?php

namespace Asti\Api;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Asti\Weather\WeatherService;

/**
 * A test controller to show off using a model.
 */
class WeatherApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * function checks if input is an ip address and if so, if it's PIv4 or Ipv6
     */
//    public function indexAction()
//    {

//    }

    public function weatherActionPost() : array
    {
        $request = $this->di->get("request");
        $geoipService = $this->di->get("geoip");
        $weatherService = $this->di->get("weather");
        $ipAdress = $request->getPost("ipCheck");
        $res = $geoipService->curlIpApi($ipAdress);
        if (isset($res["Message"])) {
            return [$res];
        }
        if (in_array("Prognos", $request->getPost())) {
            return [$weatherService->curlWeatherApi($res[0]["Longitude"], $res[0]["Latitude"])];
        } elseif ((in_array("Äldre data", $request->getPost()))) {
            return [$weatherService->curlOldWeatherApi($res[0]["Longitude"], $res[0]["Latitude"])];
        }
    }
}
