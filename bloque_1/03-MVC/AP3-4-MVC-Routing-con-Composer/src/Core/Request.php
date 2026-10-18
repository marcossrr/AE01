<?php

namespace AP34\Core;

use AP34\Core\Interfaces\RequestInterface;

/**
 * Interpreta la URI en estilo SEO: /detalle/configurar-entorno-docker en lugar de ?ruta=detalle&params=1.
 */
class Request implements RequestInterface
{
    private $route;
    private $params;

    public function __construct()
    {
        // Lo primero que debemos hacer es obtener la ruta del navegador mediante la URI
        $rawRoute = $_SERVER["REQUEST_URI"];
        // Separamos la URI en las diferentes partes que contiene, separadas por la "/" de las carpetas
        // y lo guardamos en un array.
        $rawRouteElements = explode("/", $rawRoute);
        // El primer elemento (0) lo descartamos porque es el texto de la URI que se encuentra antes de la "/"
        // Nos quedamos con el segundo elemento (1) que definimos como la ruta que va a usar nuestra aplicación
        $this->route = "/" . ($rawRouteElements[1] ?? '');
        // Guardamos todos los parámetros que hayamos recibido dentro de un nuevo array que comienza por el elemento tercero (2)
        $this->params = array_slice($rawRouteElements, 2);
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
