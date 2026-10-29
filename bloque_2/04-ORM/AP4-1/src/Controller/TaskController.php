<?php

namespace AP41\Controller;

use AP41\View\TaskView;

/**
 * Controlador para la ruta /detalle
 */
class TaskController
{
    private EntityManager $entityManager;
    private UserRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager
            ->getEntityManager()->getRepository(User::class);
    }


    public function list()
    {

    }

    public function detail(?string $slug = null)
    {

    }
}