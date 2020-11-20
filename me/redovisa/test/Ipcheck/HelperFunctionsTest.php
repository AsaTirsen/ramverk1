<?php

namespace Asti\Ipcheck;

use Anax\DI\DIFactoryConfig;
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

    public function testIndexAction() {
        $helpfn = new HelperFunctions();
        $data = ["ipAdress" => $helpfn->checkWhichTypeOfIp('127.0.0.1')];
        $this->assertContains( "That is an IPv4 address with the domain name: localhost", $data);
        $data = ["ipAdress" => $helpfn->checkWhichTypeOfIp('127.0.0.1')];


    }
}
