<?php

namespace AP35\Controller;

use AP35\Model\TaskRepository;
use AP35\View\FormTaskView;
use AP35\View\ListTasksView;
use AP35\View\DetailTaskView;

class TaskController
{
    public function list()
    {
        $repository = new TaskRepository();
        $tasks = $repository->findAll();
        $view = new ListTasksView();
        $view->render($tasks);
    }

    public function detail($slug)
    {
        $repository = new TaskRepository();
        $task = $repository->findBySlug($slug);
        $view = new DetailTaskView();
        $view->render($task ?? []);
    }

    public function new()
    {
        $view = new FormTaskView();
        $view->render();
    }

    public function save()
    {
        $repository = new TaskRepository();
        $repository->save($_POST["title"], $_POST["description"]);
        $this->list();
    }

    public function delete($id)
    {
        $repository = new TaskRepository();
        $repository->deleteById($id);
        $this->list();
    }
}
