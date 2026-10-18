<?php

namespace AP35\View;

class FormTaskView
{
    public function render()
    {
        $template = __DIR__ . "/../../public/assets/crear.html";
        include_once $template;
    }
}
