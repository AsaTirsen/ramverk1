<?php

namespace Asti\Ipcheck;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpControllerTest extends TestCase
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
        $this->controller = new IpController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */

    public function testIndexAction() {
        $helpfn = new HelperFunctions();
        $data = ["ipAdress" => $helpfn->checkWhichTypeOfIp('127.0.0.1')];
        $this->assertContains( "That is an IPv4 address with the domain name: localhost", $data);
        $data = ["ipAdress" => $helpfn->checkWhichTypeOfIp('127.0.0.1')];


    }
}
