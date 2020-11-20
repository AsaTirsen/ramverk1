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
}
