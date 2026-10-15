<?php

namespace AP33\Core;

class Request implements RequestInterface
{
    private $route;
    private $params;

    public function __construct()
    {
        $this->processRoute();
    }

    private function processRoute()
    {
        $rawRoute = $_SERVER["REQUEST_URI"];

        if (($pos = strpos($rawRoute, '?')) !== false) {
            $rawRoute = substr($rawRoute, 0, $pos);
        }

        $rawRouteElements = explode("/", $rawRoute);

        $routeSegment = $rawRouteElements[1] ?? "";
        $this->route = "/" . ltrim($routeSegment, "/");

        $this->params = array_slice($rawRouteElements, 2);

        $this->params = array_values(array_filter($this->params, function($value) {
            return $value !== '';
        }));
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getParams()
    {
        return $this->params;
    }
}