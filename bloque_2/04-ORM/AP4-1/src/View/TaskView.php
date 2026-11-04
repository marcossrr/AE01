<?php

namespace AP41\View;

use AP41\Entity\Task;

class TaskView
{
    public function list(?array $tasks = null): void
    {
        require_once __DIR__ . '/../../public/assets/tasks.html';
    }

    public function detail(?Task $task = null): void
    {
        require_once __DIR__ . '/../../public/assets/detalle.html';
    }
}
