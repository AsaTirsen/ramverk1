<?php


namespace Asti\Api;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Asti\Geoip\GeoipModel;

/**
 * A test controller to show off using a model.
 */
class GeoController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * function checks if input is an ip address and if so, if it's PIv4 or Ipv6
     */
//    public function indexAction()
//    {

//    }

//    public function checkActionPost()
//    {
//        $request = $this->di->get("request");
//        $ipAdress =$request->getPost("ipCheck");
//        $ipCheck = new IpCheck();
//        $res = json_encode($ipCheck->check($ipAdress));
//        return $res;
//    }

    public function checkActionPost()
    {
        $request = $this->di->get("request");
        $ipAdress = $request->getPost("ipCheck");
        $ipLookup = new GeoipModel();
        return json_encode($ipLookup->check($ipAdress));
    }
}
