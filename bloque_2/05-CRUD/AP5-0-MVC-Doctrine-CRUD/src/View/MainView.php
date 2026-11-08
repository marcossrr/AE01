<?php

namespace AP50\View;

class MainView
{
    /**
     * Renderiza la vista de listado de tareas.
     * @return void
     */
    public function render(): void
    {
        require_once __DIR__ . '/../../public/assets/main.html';
    }

    public function error(string $error = 'Ruta no definida'): void
    {
        require_once __DIR__ . '/../../public/assets/404.html';
    }

}