<?php

namespace Asti\Api;

use Anax\DI\DIFactoryConfig;
use Anax\Request\Request;
use Asti\Geoip\GeoipService;
use PHPUnit\Framework\TestCase;
use Asti\Weather\WeatherServiceMock;
use Asti\Weather\GeoIpServiceMock;
use Psr\Container\ContainerInterface;


/**
 * Test the SampleController.
 */
class WeatherApiControllerMock extends WeatherApiController
{
    protected $geoipService;
    protected $weatherService;
    protected $ipAdress;
    protected $request;
    protected $postRequest;

    /**
     * function checks if input is an ip address and if so, if it's PIv4 or Ipv6
     */
//    public function indexAction()
//    {

//    }

    public function setDI(ContainerInterface $di)
    {
        parent::setDI($di);
        $this->geoipService = new GeoipServiceMock();
        $this->weatherService = new WeatherServiceMock();
        $this->request = [];
        $this->ipAdress = "172.217.14.196";
        $this->postRequest = "172.217.14.196Prognos";
    }
}
