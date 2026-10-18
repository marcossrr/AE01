<?php

namespace AP34\Core;

class Request
{
    private $route;
    private $params;

    public function __construct()
    {
        $rawRoute = $_SERVER["REQUEST_URI"];
        $rawRouteElements = explode("/", $rawRoute);
        $this->route = "/" . $rawRouteElements[1];
        $this->params = array_slice($rawRouteElements, 2);
    }

    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the value of parms
     */
    public function getParams()
    {
        return $this->params;
    }
}

?>