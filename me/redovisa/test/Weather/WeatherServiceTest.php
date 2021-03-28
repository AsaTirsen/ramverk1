<?php
//
//namespace Asti\Api;
//
//use Anax\DI\DIFactoryConfig;
//use Anax\Request\Request;
//use PHPUnit\Framework\TestCase;
//
///**
// * Test the SampleController.
// */
//class WeatherServiceTest extends TestCase
//{
//
//    protected $di;
//
//    protected $model;
//    /**
//     * Prepare before each test.
//     */
//    protected function setUp()
//    {
//        global $di;
//
//        // Setup di
//        $this->di = new DIFactoryConfig();
//        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
//
//        // Use a different cache dir for unit test
//        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");
//
//        // View helpers uses the global $di so it needs its value
//        $di = $this->di;
//
//        // Setup the controller
//        $this->model = new WeatherResMock();
//    }
//
//    /**
//     * Test the route "index".
//     */
//
//    public function testWeatherActionPost() {
//        $req = new Request();
//        $req->setPost("ipCheck", "134.201.250.155Prognos");
//        $this->di->set("request", $req);
//        $res = $this->controller->weatherActionPost();
//        error_log($res[0]["CurrentTemp"]);
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
//}
//public function testWeatherRes()
//{
//    $res = $this->curlWeatherApi();
//    $this->assertEquals("5.21", $res[0]["CurrentTemp"]);
//}
