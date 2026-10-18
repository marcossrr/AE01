<?php

namespace AP35\Core;

use AP35\Core\Interfaces\RouteInterface;

class RouteCollection implements RouteInterface
{
    private $routes;

    public function __construct()
    {
        $this->routes = json_decode(file_get_contents(__DIR__ . "/../../config/routes.json"), true);
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}
