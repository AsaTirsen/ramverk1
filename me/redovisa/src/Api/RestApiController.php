<?php

namespace Asti\Api;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Asti\Api\IpCheck;

/**
 * A test controller to show off using a model.
 */
class RestApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * function checks if input is an ip address and if so, if it's PIv4 or Ipv6
     */
    public function indexAction()
    {
        $request = $this->di->get("request");
        $getParams = $request->getGet();
        if ($getParams) {
            $ip = $getParams["ipCheck"];
            $ipCheck = new IpCheck();
            $data = [
                "ipAdress" => json_encode($ipCheck->check($ip))
            ];
        } else {
            $data = ["ipAdress" => "no ip address"];
        }
        $page = $this->di->get("page");
        $page->add("ip_json_view/check", $data);
        return $page->render($data);
    }

    public function checkActionPost()
    {
        $request = $this->di->get("request");
        $ip = $request->getPost("ipCheck");
        $ipCheck = new IpCheck();
        $ipCheck->check($ip);
        return $this->di->response->redirect("http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/ipcheck?ipCheck=$ip");
    }
}
