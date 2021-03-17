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

    public function weatherActionPost()
    {
        $request = $this->di->get("request");
        $geoipService = $this->di->get("geoip");
        $weatherService = $this->di->get("weather");
        $ipAdress =$request->getPost("ipCheck");
        $res = $geoipService->curlIpApi($ipAdress);
        if (isset($res->Message)) {
            $msg = json_encode([
                "Message" => "Ipadressen är fel. Försök igen"
            ]);
            header('Content-Type: application/json');
            return $msg;
        }
        if (in_array("Prognos", $request->getPost()))
        {
            $resWeather = json_encode($weatherService->curlWeatherApi($res->Longitude, $res->Latitude));
            header('Content-Type: application/json');
            return $resWeather;
        } elseif ((in_array("Äldre data", $request->getPost())))
        {
            $resWeather = json_encode($weatherService->curlOldWeatherApi($res->Longitude, $res->Latitude));
            header('Content-Type: application/json');
            return $resWeather;
        }
    }
}
