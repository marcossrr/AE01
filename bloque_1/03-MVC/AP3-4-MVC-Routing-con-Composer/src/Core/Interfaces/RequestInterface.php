<?php

namespace AP34\Core\Interfaces;

interface RequestInterface
{
    public function getRoute();

    public function getParams();
}
