<?php

namespace Asti\Api;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class ApiControllerTest extends TestCase
{
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
        $this->controller = new RestApiController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $controller = new RestApiController();
        $res = $controller->indexAction();
        $this->assertIsObject($res);
    }

    public function testCheckActionPost() {
        $ipCheck = new IpCheck();
        $ipCheck->check("127.0.0.1");
        //check that $ipcheck is an json object


    }
}
