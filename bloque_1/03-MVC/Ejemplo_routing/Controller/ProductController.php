<?php

class ProductController
{
    public function show($id): void
    {
        echo "Product with ID: $id";
    }

    public function index(): void
    {
        echo "Product list";
    }
}
