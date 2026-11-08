# AP5-0 · Guía de referencia

CRUD completo de Productos con Doctrine sobre la base de AP4-1. Sirve de plantilla para AP5-1 y AP5-2.

## Enfoque

Misma estructura MVC + Entity/Repository; se añaden create / update / delete sobre `Task`.

## Estructura

```text
AP5-0/
├── .env
├── todolist.sql      # Base de datos y Productos de ejemplo
├── composer.json
├── config/routes.json
├── public/
│   ├── index.php
│   └── assets/          # main, list, detail, form, 404
└── src/
    ├── Controller/      # MainController, TaskController
    ├── View/
    ├── Entity/          # Task
    ├── Repository/      # TaskRepository
    └── Core/
        └── EntityManager.php …
```

Namespace: `AP51\`.

## Rutas

| Ruta | Acción |
|------|--------|
| `/` | Menú |
| `/list` | Listado |
| `/task` (+ params `read` / `create` / `update` / `delete`) | CRUD |

## Cómo probarlo

Importa `todolist.sql`, incluido en esta carpeta, y configura la conexión a la base de datos `todolist` en `.env`.

Desde tu carpeta de actividad `bloque_2/05-CRUD/AP5-0`:

```bash
composer install
php -S 0.0.0.0:8001 -t public
```

Para probar directamente la solución descargada, entra en `AP5-0-MVC-Doctrine-CRUD` en lugar de tu carpeta `AP5-0`.
