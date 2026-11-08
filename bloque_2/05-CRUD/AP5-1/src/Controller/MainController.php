<?php
declare(strict_types=1);

namespace AP51\Controller;

use AP51\View\MainView;

class MainController
{

    public function main(): void
    {
        $view = new MainView();
        $view->render();
    }

    public function noRuta(): void
    {
        $view = new MainView();
        $view->error();
    }
}
