<?php

namespace AP51\Controller;

use AP51\Core\EntityManager;
use AP51\Entity\Clients;
use AP51\Repository\ClientsRepository;
use AP51\View\MainView;
use AP51\View\ClientsView;

class ClientController
{
        private EntityManager $entityManager;
        private ClientsRepository $repository;

        public function __construct()
        {
            $this->entityManager = new EntityManager();
            $this->repository = $this->entityManager->getEntityManager()->getRepository(Clients::class);
        }

    public function list(): void
    {
        $products = $this->repository->findAll();
        $view = new ClientsView();
        $view->list($clients);
    }
}