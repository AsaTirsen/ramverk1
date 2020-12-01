<?php

namespace Asti\Geoip;

use Asti\Geoip\CurlModel;

class GeoipService
{
    /*
     *
     * curls api, get_file_contents
     * sends response to model
     *
     */
//
//    private $key = null;
//    private $url = null;
//
//    public function setKey() : void
//    {
//        $this->key = "52ca019cf35f1e86f782ed09916211c8";
//    }
//
//    public function setUrl() : void
//    {
//        $this->url = "http://api.ipstack.com/";
//    }
//

    public function getKey() : string
    {
        return "52ca019cf35f1e86f782ed09916211c8";
    }

    public function getUrl() : string
    {
        return "http://api.ipstack.com/";
    }

    public function curlIpApi($ipAdr) : array
    {
        $curl = new CurlModel();
        return $curl->getDataThroughCurl($this->getUrl() . $ipAdr . "?access_key=" . $this->getKey());
    }
}
