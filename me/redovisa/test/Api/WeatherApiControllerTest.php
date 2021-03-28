<?php

namespace Asti\Api;

use Anax\DI\DIFactoryConfig;
use Anax\Request\Request;
use Asti\Geoip\GeoipService;
use Asti\Weather\WeatherService;
use MongoDB\Driver\WriteError;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class WeatherApiControllerTest extends TestCase
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
        $this->controller = new WeatherApiController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */

    public function testWeatherActionPost() {
        $request = $this->di->get("request");
        $request->setPost("ipCheck", "172.217.14.196");
        $request->setPost("forecast", "Prognos");
        $resWeather = $this->controller->weatherActionPost();
        $this->assertIsArray($resWeather);
        $this->assertArrayHasKey("CurrentTemp", $resWeather[0][0]);
        $this->assertArrayHasKey("CurrentFeelsLike", $resWeather[0][0]);
        $this->assertArrayHasKey("CurrentWeather", $resWeather[0][0]);
        $this->assertArrayHasKey("DailyDates", $resWeather[0][0]);
        $this->assertArrayHasKey("DailyTemperatures", $resWeather[0][0]);
        $this->assertArrayHasKey("DailyFeelsLike", $resWeather[0][0]);
        $this->assertArrayHasKey("DailyDescriptions", $resWeather[0][0]);
        $request->setPost("ipCheck", "172.217.14.196");
        $request->setPost("forecast", "Äldre data");
        $resWeather = $this->controller->weatherActionPost();
        $this->assertArrayHasKey("Date1", $resWeather[0][0]);
        $this->assertArrayHasKey("CurrentTemp1", $resWeather[0][0]);
        $this->assertArrayHasKey("CurrentWeather1", $resWeather[0][0]);
        $this->assertArrayHasKey("CurrentTemp2", $resWeather[0][0]);
        $this->assertArrayHasKey("CurrentTemp3", $resWeather[0][0]);
        $this->assertArrayHasKey("CurrentTemp4", $resWeather[0][0]);
        $this->assertArrayHasKey("CurrentTemp5", $resWeather[0][0]);
    }
}
