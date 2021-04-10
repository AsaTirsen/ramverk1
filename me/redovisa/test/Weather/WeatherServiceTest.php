<?php

namespace Asti\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Asti\Weather\WeatherServiceMock;

/**
 * Test the SampleController.
 */
class WeatherServiceTest extends TestCase
{

    protected $di;

    protected $model;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->model = new WeatherServiceMock();
    }

    /**
     * Test the route "index".
     */

    public function testGetUrl()
    {
        assertContains("yadayada.com", $this->model->getUrl());
    }

//    public function testWeatherActionPost()
//    {
//
//        $this->assertContains('"CurrentTemp', $res);
//        $req->setPost("ipCheck", "12");
//        $this->di->set("request", $req);
//        $res = $this->controller->weatherActionPost();
//        $this->assertContains('"Type":null', $res);
//        $req->setPost("ipCheck", "2607:f8b0:4004:80a::200e");
//        $this->di->set("request", $req);
//        $res = $this->controller->weatherActionPost();
//        $this->assertContains('"Type":"ipv6"', $res);
//
//    }
//
//    public function testWeatherRes()
//    {
//        $res = $this->curlWeatherApi();
//        $this->assertEquals("5.21", $res[0]["CurrentTemp"]);
//    }
}
