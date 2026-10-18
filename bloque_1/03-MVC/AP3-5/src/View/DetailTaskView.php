<?php

namespace AP35\View;

class DetailTaskView
{
    public function render(array $task): void
    {
        if ($task === []) {
            echo "No se han recibido datos de la tarea.";
            echo "<p><a href='/'>volver</a></p>";
            return;
        }

        include_once __DIR__ . "/../../public/assets/detalle.html";
    }
}
