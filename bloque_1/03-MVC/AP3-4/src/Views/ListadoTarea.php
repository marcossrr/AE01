<?php

namespace AP34\Views;

class ListadoTarea
{
    public function render(){
        $template = __DIR__ . "/../../public/assets/tareas.html";
        include_once $template;
    }
}