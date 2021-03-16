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
class GeoipJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction(): object
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $page = $this->di->get("page");
        $data = [
            "ipAdress" => $ip
            ];
        $page->add("geo_ip_json_view/ip_json_check", $data);
        return $page->render($data);
    }


}
