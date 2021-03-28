<?php

namespace Asti\Api;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;


/**
 * Test the SampleController.
 */
class WeatherApiControllerMockTest extends TestCase
{
    protected $di;
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
        $this->controller = new WeatherApiControllerMock();
        $this->controller->setDI($this->di);
    }

    public function testWeatherActionPost()
    {
        $resWeather = $this->controller->weatherActionPost();
        $this->assertIsArray($resWeather);
        error_log(implode($resWeather[0]));
        $this->assertArrayHasKey("CurrentTemp", $resWeather[0]);
//        $this->assertArrayHasKey("CurrentFeelsLike", $resWeather[0]);
//        $this->assertArrayHasKey("CurrentWeather", $resWeather[0]);
//        $this->assertArrayHasKey("DailyDates", $resWeather[0]);
//        $this->assertArrayHasKey("DailyTemperatures", $resWeather[0]);
//        $this->assertArrayHasKey("DailyFeelsLike", $resWeather[0]);
//        $this->assertArrayHasKey("DailyDescriptions", $resWeather[0]);
        error_log("allpassed");
    }
}
//class FControllerMock extends FController
//{
//    public function initialize()
//    {
//        parent::initialize();
//        $this->userContainer = new FUsersMock();
//        $this->userContainer->setApiUrl("");
//    }
//}
