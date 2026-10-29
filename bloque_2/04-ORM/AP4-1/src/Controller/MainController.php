<?php

namespace AP41\Controller;

use AP41\View\MainView;

class MainController
{
    public function noRuta(): void
    {
        $vista = new MainView();
        $vista->error();
    }
}