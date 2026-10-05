<?php

require_once __DIR__ . "/../Model/DataRepository.php";
require_once __DIR__ . "/../View/DataView.php";

class DataController {
    public function index(): void {
        $repository = new DataRepository();
        $data = $repository->findAll();

        $view = new DataView();
        $view->render($data);
    }
}