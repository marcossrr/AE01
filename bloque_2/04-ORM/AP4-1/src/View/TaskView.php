<?php

namespace AP41\View;

use AP41\Entity\Task;

class TaskView
{
    public function list(array $tareas = null): void
    {
        require_once __DIR__ . '/../../public/assets/tareas.html';
    }

    public function detail(?Task $tarea = null): void
    {
        require_once __DIR__ . '/../../public/assets/detalle.html';
    }
}
