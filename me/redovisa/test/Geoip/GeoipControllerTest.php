<?php

namespace Asti\Geoip;

use Anax\DI\DIFactoryConfig;
use Anax\Request\Request;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class GeoipControllerTest extends TestCase
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
        $this->controller = new GeoipController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */

    public function testIndexAction() {
        $_SERVER['REMOTE_ADDR']= "127.0.0.1";
        $res = $this->controller->indexAction();
        $this->assertIsObject($res);
        $req = new Request();
        $this->di->set("request", $req);
        $req->setGet("ipCheck", "127.0.0.1");
        $res = $this->controller->indexAction();
        $this->assertIsObject($res);
    }
}
