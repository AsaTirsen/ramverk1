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

    private $key = null;
    private $url = null;

    public function setKey($key) : void
    {
        $this->key = $key;
    }

    public function setUrl($url) : void
    {
        $this->url = $url;
    }

    public function curlIpApi() : string
    {   $ip = "134.201.250.155";
        $curl = new CurlModel();
        return $curl->getDataThroughCurl($this->url, $this->key, $ip);
    }
}
