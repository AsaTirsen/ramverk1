<?php

namespace Asti\Geoip;


class CurlModel
{

    public function getDataThroughCurl(string $url, $key, $ip)
    {
//        $url = "http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/ipcheck/check?ipCheck=$ip";


        //  Initiate curl handler
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Execute
        $data = curl_exec($ch);

        // Closing
        curl_close($ch);

        return json_decode($data, true);
    }

    public function postDataThroughCurl($ipAdress) {
        //$url = "http://localhost:8080/dbwebb/ramverk1/me/redovisa/htdocs/api/ipcheck/check";
        $url = "http://www.student.bth.se/~asti18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/api/ipcheck/check";

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
}
