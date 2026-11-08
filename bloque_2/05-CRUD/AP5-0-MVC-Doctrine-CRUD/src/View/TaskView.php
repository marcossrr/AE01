<?php

namespace AP50\View;

class TaskView
{
    public function list(array $tasks)
    {
        require_once __DIR__ . "/../../public/assets/list.html";
    }

    public function detail($task)
    {
        require_once __DIR__ . "/../../public/assets/detail.html";
    }

    public function form($update = false, $task = null)
    {
        require_once __DIR__ . "/../../public/assets/form.html";
    }
}
