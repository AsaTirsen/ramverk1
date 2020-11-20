<?php

namespace Asti\Ipcheck;

use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class HelperFunctionsTest extends TestCase
{

    private $HelperFunctions;
    /**
     * Prepare before each test.
     */
    protected function setUp() : void
    {
        $this->HelperFunctions = new HelperFunctions();
    }

    /**
     * Test the route "index".
     */

    public function testHelperFunctions() {
        $data = ["ipAdress" => $this->HelperFunctions->checkWhichTypeOfIp('127.0.0.1')];
        $this->assertContains( "That is an IPv4 address with the domain name: localhost", $data);
        $data = ["ipAdress" => $this->HelperFunctions->checkWhichTypeOfIp('127')];
        $this->assertContains( "That is not a valid IP-adress", $data);
        $data = ["ipAdress" => $this->HelperFunctions->checkWhichTypeOfIp('2607:f8b0:4004:80a::200e')];
        $this->assertContains( "That is an IPv6 address with the domain name: iad23s40-in-x0e.1e100.net", $data);
    }
}
