<?php
// Simulated dynamic URL: ?url=Product/show/12
$url = $_GET['url'] ?? 'Product';
$urlParts = explode('/', $url);

$controller = !empty($urlParts[0]) ? $urlParts[0] . 'Controllers' : 'ProductController';
$action = $urlParts[1] ?? 'index';
$param = $urlParts[2] ?? null;

// Map "show" style actions; demo uses English class names
require_once __DIR__ . '/Controller/' . $controller . '.php';

$controllerObject = new $controller();
if ($param !== null) {
    $controllerObject->$action($param);
} else {
    $controllerObject->$action();
}
