<?php

namespace Asti\Geoip;


class CurlModel
{

    public function getDataThroughCurl(string $url)
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
}
