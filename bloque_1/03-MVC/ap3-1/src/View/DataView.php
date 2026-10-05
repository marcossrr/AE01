<?php

class DataView {
    public function render(array $data): void {
        $template = __DIR__ . '/../../public/assets/data.html';
        include_once $template;
    }
}