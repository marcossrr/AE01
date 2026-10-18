<?php

namespace AP34\Views;

class CrearTarea
{
    public function render(){
        $template = __DIR__ . "/../../public/assets/new.html";
        include_once $template;
    }
}