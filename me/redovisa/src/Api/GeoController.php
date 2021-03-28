<?php


namespace Asti\Api;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A test controller to show off using a model.
 */
class GeoController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * function uses ip adress from post as aprameter to curl API
     */

    public function checkActionPost()
    {
        $request = $this->di->get("request");
        $ipAdress = $request->getPost("ipCheck");
        $geoipService = $this->di->get("geoip");
        return [$geoipService->curlIpApi($ipAdress)];
    }
}
