<?php

namespace AP51\View;

class ProductView
{
    public function list(array $products)
    {
        require_once __DIR__ . "/../../public/assets/productList.html";
    }

    public function detail($product)
    {
        require_once __DIR__ . "/../../public/assets/productDetail.html";
    }

    public function form($update = false, $product = null)
    {
        require_once __DIR__ . "/../../public/assets/form.html";
    }
}
