<?php

namespace AP51\Controller;

use AP51\Core\EntityManager;
use AP51\Entity\Product;
use AP51\Repository\ProductRepository;
use AP51\View\MainView;
use AP51\View\ProductView;

class productController
{
        private EntityManager $entityManager;
        private productRepository $repository;

        public function __construct()
        {
            $this->entityManager = new EntityManager();
            $this->repository = $this->entityManager->getEntityManager()->getRepository(Product::class);
        }

        public function list(): void
        {
            $products = $this->repository->findAll();
            $view = new productView();
            $view->list($products);
        }

        public function crud(...$params): void
        {
            $action = $params[0] ?? null;
            $id = $params[1] ?? null;

            switch ($action) {
                case 'create':
                    $this->create();
                    break;
                case 'read':
                    $this->read($id);
                    break;
                case 'update':
                    $this->update($id);
                    break;
                case 'delete':
                    $this->delete($id);
                    break;
                default:
                    $this->noRuta();
            }
        }

    private function create(): void
    {
        if (!isset($_POST['submit'])) {
            $view = new ProductView();
            $view->form(false, null);
        } else {
            $product = new Product();

            $product->setId($_POST['id']);
            $product->setDescription($_POST['description']);

            $em = $this->entityManager->getEntityManager();
            $em->persist($product);
            $em->flush();

            $this->list();
        }
    }
        private function update(?string $id): void
        {
            $productId = intval($id);
            $product = $this->repository->find($productId);

            if(!$product) {
                $this->noRuta();
                return;
            }

            if(!isset($_POST['submit'])){
                if(!isset($_POST['description'])) {
                    $this->noRuta();
                    return;
                }

                $product->setDescription($_POST['description']);

                $em = $this->entityManager->getEntityManager();
                $em->flush();

                $this->list();
            }else{
                $view = new productView;
                $view->form(true, $product);
            }
        }

    private function delete(?string $id): void
    {
        $productId = intval($id);
        $product = $this->repository->find($productId);

        if(!$product){
        $this->noRuta();
        return;
        }

        $em = $this->entityManager->getEntityManager();
        $em->remove($product);
        $em->flush();

        $this->list();

    }

    private function read(?string $slug): void
    {
        $product = $this->repository->findOneBy(['slug' => $slug]);

        if (!$product) {
            $this->noRuta();
            return;
        }

        $view = new ProductView();
        $view->detail($product);
    }

    private function noRuta()
    {
        (new MainView())->error();
    }

}