<?php

namespace AP33\Core;

interface RequestInterface {
    public function getRoute();
    public function getParams();
}