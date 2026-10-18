<?php

namespace AP34\View;

class ListTasksView
{
    public function render(?array $tasks = null)
    {
        $tasks = $tasks ?? [];
        $template = __DIR__ . "/../../public/assets/tareas.html";
        include_once $template;
    }
}
