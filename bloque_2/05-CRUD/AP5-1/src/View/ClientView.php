<?php

namespace AP51\View;

class ClientView
{
    public function list(array $client)
    {
        require_once __DIR__ . "/../../public/assets/clientList.html";
    }

}
