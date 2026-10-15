<?php

require_once __DIR__ . '/../vendor/autoload.php';

use AP33\Core\Request;
use AP33\Core\RouteCollection;
use AP33\Core\Dispatcher;

try {

    $request = new Request();
    $routes = new RouteCollection('../config/routes.json');

    $dispatcher = new Dispatcher($routes, $request);
    $dispatcher->dispatch();

} catch (\Exception $e) {
    http_response_code(500);
    echo "Error del sistema: " . $e->getMessage();
}


