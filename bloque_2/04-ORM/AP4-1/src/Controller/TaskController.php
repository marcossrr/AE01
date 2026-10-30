<?php

namespace AP41\Controller;

use AP41\View\TaskView;
use AP41\Core\EntityManager;
use AP41\Entity\Task;

/**
 * Controlador para la ruta /detalle
 */
class TaskController
{
    private EntityManager $entityManager;
    private taskRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(task::class);
    }


    public function list()
    {
        $tasks = $this->repository->findAll();
    }

    public function detail(?string $slug = null)
    {
        $task = $this->repository->findByOne([
            'slug' => $slug
        ]);

        if(!task){
            throw new \Exception("La task no existe");
        }
    }
}