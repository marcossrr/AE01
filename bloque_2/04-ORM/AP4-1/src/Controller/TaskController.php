<?php

namespace AP41\Controller;

use AP41\View\TaskView;
use AP41\Core\EntityManager;
use AP41\Entity\Task;
use AP41\Repository\TaskRepository;

/**
 * Controlador para la ruta /detalle
 */
class TaskController
{
    private EntityManager $entityManager;
    private TaskRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Task::class);
    }

    public function list()
    {
        $tasks = $this->repository->findAll();

        $view = new TaskView();
        $view->list($tasks);
    }

    public function detail(?string $slug = null)
    {
        $task = $this->repository->findOneBy([
            'slug' => $slug
        ]);

        if (!$task) {
            throw new \Exception("La task no existe");
        }

        $view = new TaskView();
        $view->detail($task);
    }
}