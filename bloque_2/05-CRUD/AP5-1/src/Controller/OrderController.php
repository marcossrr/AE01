<?php

namespace AP51\Controller;

use AP51\Core\EntityManager;
use AP51\Entity\Order;
use AP51\Repository\OrderRepository;
use AP51\View\MainView;
use AP51\View\OrderView;

class OrderController
{
        private EntityManager $entityManager;
        private OrderRepository $repository;

        public function __construct()
        {
            $this->entityManager = new EntityManager();
            $this->repository = $this->entityManager->getEntityManager()->getRepository(Order::class);
        }

    public function list(): void
    {
        $orders = $this->repository->findAll();
        $view = new OrderView();
        $view->list($orders);
    }
}