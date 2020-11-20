<?php

namespace Asti\Ipcheck;

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
class IpJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     *
     * @return string
     *
     */
    public function indexAction(): object
    {
        $page = $this->di->get("page");
        $page->add("ip_json_view/ip_json_check");
        return $page->render();
    }

    public function checkActionGet() {
        $request = $this->di->get("request");
        $ipAdress = $request->getGet("ipCheck");
        $data = $this->postDataThroughCurl($ipAdress);
        $page = $this->di->get("page");
        $page->add("ip_json_view/check", $data);
        return $page->render($data);
    }


    public function postDataThroughCurl($ipAdress) {
        $url = "http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/ipcheck/check";

        $postRequest = ['ipCheck' => $ipAdress];

        //  Initiate curl handler
        $curlConnection = curl_init($url);

        // Will return the response, if false it print the response
        curl_setopt($curlConnection, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curlConnection, CURLOPT_POSTFIELDS, $postRequest);

        $apiResponse = curl_exec($curlConnection);


        // Closing
        curl_close($curlConnection);

        $json = json_decode($apiResponse, true);
        return $json;

    }

//    public function getDataThroughCurl(string $ip)
//    {
//        $url = "http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/ipcheck/check?ipCheck=$ip";
//
//        //  Initiate curl handler
//        $ch = curl_init();
//
//        // Will return the response, if false it print the response
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//        // Set the url
//        curl_setopt($ch, CURLOPT_URL, $url);
//
//        // Execute
//        $data = curl_exec($ch);
//
//        // Closing
//        curl_close($ch);
//
//        $json = json_decode($data, true);
//        return $json;
//    }

}

