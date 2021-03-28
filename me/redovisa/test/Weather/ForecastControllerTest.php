<?php

namespace Asti\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class ForecastControllerTest extends TestCase
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
        $this->controller = new ForecastController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */

    public function testIndexAction() {
        $request = $this->di->get("request");
        $this->di->set("request", $request);
        $request->setGet("ipCheck", "172.217.14.196&type=Prognos");
        $resWeather = $this->controller->indexAction();
        $this->assertIsObject($resWeather);
        $request->setGet("ipCheck", "172.217.14.196&type=Äldre data");
        $this->assertIsObject($resWeather);
    }
}
