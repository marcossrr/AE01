<?php

namespace AP42\Controller;

use AP42\View\MainView;

class MainController
{
    public function noRuta(): void
    {
        $vista = new MainView();
        $vista->error();
    }
}