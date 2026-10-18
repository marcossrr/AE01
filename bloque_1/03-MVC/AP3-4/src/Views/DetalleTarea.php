<?php

namespace AP34\Views;

class DetalleTarea
{
    public function render(){
        $template = __DIR__ . "/../../public/assets/detalle.html";
        include_once $template;
    }
}