<?php

namespace Asti\Api;

use Anax\DI\DIFactoryConfig;
use Anax\Request\Request;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class ApiControllerTest extends TestCase
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
        $this->controller = new RestApiController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test the route "index".
     */

    public function testCheckActionPost() {
        $req = new Request();
        $req->setPost("ipCheck", "127.0.0.1");
        $this->di->set("request", $req);
        $res = $this->controller->checkActionPost();
        $this->assertContains('"IPv4":"127.0.0.1"', $res);
        $req->setPost("ipCheck", "12");
        $this->di->set("request", $req);
        $res = $this->controller->checkActionPost();
        $this->assertContains('"DomainName":"false"', $res);
        $req->setPost("ipCheck", "2607:f8b0:4004:80a::200e");
        $this->di->set("request", $req);
        $res = $this->controller->checkActionPost();
        $this->assertContains('"IPv6":"2607:f8b0:4004:80a::200e"', $res);

//
//        $ipCheck = new IpCheck();
//        $res = json_encode($ipCheck->check("127.0.0.1"));
//        $this->assertIsString($res);
//        $this->assertContains('"Valid":true', $res);
//        $res = json_encode($ipCheck->check("0.0.1"));
//        $this->assertContains('"Valid":false', $res);
//        $res = json_encode($ipCheck->check("2607:f8b0:4004:80a::200e"));
//        $this->assertContains('"Valid":true', $res);
//        $ipAdress = $this->di->get("request")->getPost();
//        $json = [
//            "message" => __METHOD__. "POST",
//            "ipAdress" => $ipAdress
//        ];
//        return $json;
    }
}
