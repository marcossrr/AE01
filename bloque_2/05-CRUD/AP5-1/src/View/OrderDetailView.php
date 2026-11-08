<?php

namespace AP51\View;

class OrderDetailView
{
    public function list(array $orderDetail)
    {
        require_once __DIR__ . "/../../public/assets/orderDetailList.html";
    }
}
