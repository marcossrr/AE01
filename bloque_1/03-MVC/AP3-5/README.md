# AP3-4 · Guía de referencia

Explicación de Composer, routing por path y ampliación CRUD. El reto está en `AP3-4.md`.

## Enfoque

Dos saltos respecto a AP3-3:

1. **Composer** sustituye `autoload.php` → namespaces PSR-4.
2. **Path routing**: `Request` interpreta `$_SERVER['REQUEST_URI']` en segmentos, no solo la query string.

Además se añaden alta y borrado sobre el mismo controlador de dominio.

## Composer

Ejemplo mínimo de `composer.json`:

```json
{
  "name": "daw-dwes/ap3-4",
  "autoload": {
    "psr-4": {
      "AP35\\": "src/"
    }
  },
  "require": {}
}
```

```bash
composer dump-autoload
```

En `public/index.php`:

```php
require_once dirname(__DIR__) . '/vendor/autoload.php';
```

## Estructura de referencia

```text
AP3-4-MVC-Routing-con-Composer/
├── composer.json
├── public/
│   ├── index.php
│   └── assets/
├── src/
│   ├── Controller/
│   ├── Model/
│   ├── View/
│   └── Core/
│       ├── Database.php
│       ├── Dispatcher.php
│       ├── Request.php
│       ├── RouteCollection.php
│       └── Interfaces/
└── config/
    ├── dbConfig.json
    └── routes.json
```

## Idea del parsing de path

```php
$rawRoute = $_SERVER['REQUEST_URI'];
$rawRouteElements = explode('/', $rawRoute);
$this->route = '/' . ($rawRouteElements[1] ?? '');
$this->params = array_slice($rawRouteElements, 2);
```

Así `/detalle/configurar-entorno-docker` deja la ruta `/detalle` y el parámetro `configurar-entorno-docker` (el **slug**).

## Rutas de ejemplo

| Ruta | Acción típica | Funcionalidad |
|------|---------------|---------------|
| `/` | `list` | Listado |
| `/detalle` | `detail` | Detalle (**slug** en params) |
| `/addTask` | `new` | Formulario de alta |
| `/saveTask` | `save` | Procesa el POST |
| `/deleteTask` | `delete` | Elimina por **id** y vuelve al listado |

Ejemplos de URL:

| URL | Comportamiento |
|-----|----------------|
| `http://localhost:8001/` | Listado |
| `http://localhost:8001/detalle/configurar-entorno-docker` | Detalle por slug |
| `http://localhost:8001/addTask` | Formulario de alta |
| `http://localhost:8001/saveTask` | Guardado (POST del formulario) |
| `http://localhost:8001/deleteTask/3` | Borrado por id |

```json
{
  "/": { "controller": "TaskController", "action": "list" },
  "/detalle": { "controller": "TaskController", "action": "detail" },
  "/addTask": { "controller": "TaskController", "action": "new" },
  "/saveTask": { "controller": "TaskController", "action": "save" },
  "/deleteTask": { "controller": "TaskController", "action": "delete" }
}
```

En el repositorio conviene `findBySlug($slug)` para el detalle y `deleteById($id)` para el borrado (y, al guardar, generar el slug a partir del título). La columna `slug` ya viene en `todolist.sql`.
## SOLID (recomendado)

| Interfaz | Quién la implementa | Garantiza |
|----------|---------------------|-----------|
| `DatabaseInterface` | `Database` | `executeSQL` / `executeSQLnoreturn` |
| `RequestInterface` | `Request` | `getRoute` / `getParams` |
| `RouteInterface` | `RouteCollection` | `getRoutes` |

## Cómo probarlo

```bash
composer dump-autoload
php -S 0.0.0.0:8001 -t public
```

Importar `todolist.sql` si hace falta. Comprueba listado, detalle, alta y borrado.
