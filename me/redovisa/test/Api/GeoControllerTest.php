<?php

namespace Asti\Api;

use Anax\DI\DIFactoryConfig;
use Anax\Request\Request;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class GeoControllerTest extends TestCase
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
        $geoipService = $this->di->get("geoip");
        $this->controller = new GeoController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */

    public function testCheckActionPost() {
        $req = new Request();
        $req->setPost("ipCheck", "172.217.14.196");
        $this->di->set("request", $req);
        $res = $this->controller->checkActionPost();
//        error_log($res[0][0]["UserInput"]);
        $this->assertContains("172.217.14.196", $res[0][0]["UserInput"]);
        $this->assertContains("ipv4", $res[0][0]["Type"]);
        $req->setPost("ipCheck", "12");
        $this->di->set("request", $req);
        $res = $this->controller->checkActionPost();
//        error_log($res[0]["Message"]);
        $this->assertContains("IP-adressen är fel. Försök igen", $res[0]["Message"]);
        $req->setPost("ipCheck", "2607:f8b0:4004:80a::200e");
        $this->di->set("request", $req);
        $res = $this->controller->checkActionPost();
        $this->assertContains("2607:f8b0:4004:80a::200e", $res[0][0]["UserInput"]);
        $this->assertContains('"Type":"ipv6"', $res[0][0]);
    }
}

