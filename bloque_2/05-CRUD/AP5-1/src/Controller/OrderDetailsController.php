<?php

namespace AP51\Controller;

use AP51\Core\EntityManager;
use AP51\Entity\OrderDetail;
use AP51\Repository\OrderDetailsRepository;
use AP51\View\MainView;
use AP51\View\OrderDetailsView;

class OrderDetailsController
{
        private EntityManager $entityManager;
        private OrderDetailsRepository $repository;

        public function __construct()
        {
            $this->entityManager = new EntityManager();
            $this->repository = $this->entityManager->getEntityManager()->getRepository(OrderDetail::class);
        }

    public function list(): void
    {
        $orderDetail = $this->repository->findAll();
        $view = new OrdeDetailsView();
        $view->list($orderDetail);
    }
}