<?php

namespace Asti\Geoip;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class GeoipController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     *
     *
     */

    public function indexAction(): object
    {
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $getParams = $request->getGet();
        $ipLookup = new GeoipModel();
        if ($getParams) {
            $ipAdr = $getParams["ipCheck"];
            $data = [
                "content" => json_encode($ipLookup->check($ipAdr))
            ];
            $page->add("geo_ip_view/geo_ip_result", $data);
            return $page->render($data);
        }
        $page->add("geo_ip_view/geo_ip_check");
        return $page->render();
    }


//
//    public function diAction()
//    {
//        $geoip = $this->di->get("geoip");
//
//        $data = [
//            "content" => $geoip->getKey(),
//        ];
//
//        $page = $this->di->get("page");
//        $page->add("geo_ip_view/geo_ip_check");
//        return $page->render($data);
//    }


//    public function checkActionGet()
//    {
//        $request = $this->di->get("request");
//        $ipAdress = $request->getGet("ipCheck");
//        $data = $this->postDataThroughCurl($ipAdress);
//        $page = $this->di->get("page");
//        $page->add("ip_json_view/check", $data);
//        return $page->render($data);
//    }
}
