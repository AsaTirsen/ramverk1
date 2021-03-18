<?php

namespace Asti\Ipcheck;


/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class HelperFunctions
{

    /**
     *
     * function checks if input is an ip address and if so, if it's PIv4 or Ipv6
     */
    public function checkWhichTypeOfIp(string $ipAdress): string
    {
        if (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $hostname = gethostbyaddr($ipAdress);
            return "That is an IPv6 address with the domain name: " . $hostname;
        } else if (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $hostname = gethostbyaddr($ipAdress);
            return "That is an IPv4 address with the domain name: " . $hostname;
        } else {
            return "That is not a valid IP-adress";
        }
    }

    public function loopThroughDate($dateArray): array
    {
        $newDateArray = [];
        forEach ($dateArray as $date) {
            $modifiedDate = date("Y-m-d", array_shift($date));
            array_push($newDateArray, $modifiedDate);
        }
        return $newDateArray;
    }
    public function loopThroughTemp($dateArray, $el1, $el2): array
    {
        $newTempArray = [];
        forEach ($dateArray as $temp) {
            $modTemp = $temp[$el1][$el2];
            array_push($newTempArray, substr($modTemp,0 ,5));
        }
        return $newTempArray;
    }
    public function loopThroughDesc($dateArray, $el1, $el2): array
    {
        $newDescArray = [];
        forEach ($dateArray as $desc) {
            $modDesc = $desc[$el1][0][$el2];
            array_push($newDescArray, $modDesc);
        }
        return $newDescArray;
    }
}
