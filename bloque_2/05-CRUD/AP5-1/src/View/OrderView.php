<?php

namespace AP51\View;

class OrderView
{
    public function list(array $order)
    {
        require_once __DIR__ . "/../../public/assets/orderList.html";
    }

}
