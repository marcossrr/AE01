<?php

namespace AP35\Core\Interfaces;

interface RequestInterface
{
    public function getRoute();

    public function getParams();
}
