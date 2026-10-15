<?php

namespace AP33\Controller;

use AP33\Models\TaskRepository;

class TaskController {

    public function list() {
        $tasks = TaskRepository::getAll();
        require_once __DIR__ . '/../Views/task_list.php';
    }

    public function detail() {
        $id = isset($_GET['params']) ? $_GET['params'] : null;

        if ($id) {
            $task = TaskRepository::getById($id);

            if ($task) {
                require_once __DIR__ . '/../Views/task_detail.php';
                return;
            }
        }

        $errorMessage = "La tarea solicitada no existe.";
        require_once __DIR__ . '/../Views/error.php';
    }
}