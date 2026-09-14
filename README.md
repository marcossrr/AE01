# 26-27 DWES — Actividades prácticas

Repositorio del curso para las **actividades prácticas (AP)**.
Las AEV y los exámenes van en asignaciones aparte de GitHub Classroom.

## Estructura

```
Dockerfile / docker-compose.yml   Entorno Docker (PHP 8.5 + MariaDB)
bloque_1/          PHP, patrones de diseño
  01-PHP/
  02-POO/
  03-MVC/
bloque_2/          Acceso a datos
  04-ORM/
  05-CRUD/
bloque_3/          Framework Symfony
  06-Symfony/
  07-Symfony_API/
  08-Symfony_Security/
```

## Entorno de trabajo

Hasta mitad de curso usamos **Docker** del repo. Antes de Symfony instalamos **PHP 8.5 en local**; Docker solo para la base de datos.


| Fase | Bloques     | PHP                                                           | Base de datos                   |
| ---- | ----------- | ------------------------------------------------------------- | ------------------------------- |
| 1    | 1 y 2       | Docker (obligatorio). Local opcional.                         | MariaDB en Docker (`3307`)      |
| 2    | 3 (Symfony) | Local obligatorio (PHP 8.5 + Composer + Symfony CLI + Xdebug) | Solo MariaDB en Docker (`3307`) |


### Docker (Bloques 1 y 2)

Todo se ejecuta **desde la raíz del repositorio** (donde está el `docker-compose.yml`).

#### 1. Arrancar el entorno

Abre **Docker Desktop** y lanza el siguiente comando en la terminal:

```bash
docker compose up -d
```

Levanta los contenedores en segundo plano (`-d`): PHP y MariaDB. Solo hace falta la primera vez o cuando los hayas parado.

#### 2. Arrancar el servidor de una AP

Elige **una** de estas dos formas (hacen lo mismo: lanzar `php -S` dentro del contenedor). Usa `0.0.0.0` (no `localhost`) para que Docker pueda reenviar el tráfico desde tu PC. Mientras el servidor esté en marcha, la AP se ve en el navegador.

**Opción A — un solo comando**

```bash
docker compose exec php php -S 0.0.0.0:8000 -t bloque_1/01-PHP/ap1-0
```

`-t` indica la carpeta de la AP. Sustituye la ruta por la de tu actividad.

**Opción B — entrar al contenedor**

Útil si quieres moverte por carpetas o lanzar varios comandos:

```bash
docker compose exec php bash
```

```bash
cd bloque_1/01-PHP/ap1-0
```

```bash
php -S 0.0.0.0:8000
```

Para salir: `Ctrl+C` (para el servidor) y luego `exit` (sales del contenedor).

> **Tip:** recuerda que puedes usar `Ctrl+R` en la terminal para buscar un comando que ya hayas ejecutado antes.

#### Puertos


| Qué             | Dónde                           | Cómo acceder               |
| --------------- | ------------------------------- | -------------------------- |
| PHP (navegador) | Host `8001` → contenedor `8000` | `http://localhost:8001`    |
| MariaDB         | Host `3307` → contenedor `3306` | user/pass: `root` / `root` |


El mapeo `8001:8000` deja libre el puerto `8000` de tu PC por si más adelante usas PHP en local.

### Local (a partir del Bloque 3)

Sigue el tutorial de instalación de PHP 8.5 (macOS / Windows) que se publicará en clase.

Con PHP en local, el contenedor de PHP no hace falta. Deja Docker solo para MariaDB y en el `.env` del proyecto Symfony:

```
DATABASE_URL="mysql://root:root@127.0.0.1:3307/nombre_bd?serverVersion=16&charset=utf8"
```

## Cómo trabajar

1. Crea una carpeta por actividad **dentro del tema** correspondiente.
2. Usa el código de la AP en **minúsculas** como nombre de carpeta, por ejemplo:
- `bloque_1/01-PHP/ap1-1`
- `bloque_1/03-MVC/ap3-2`
- `bloque_3/06-Symfony/ap61`
- `bloque_3/07-Symfony_API/ap71`
- `bloque_3/08-Symfony_Security/ap81`
3. Haz commit y push con frecuencia.

## Exportar un ZIP para Florida Oberta

Cuando haya que subir una actividad a Florida Oberta, comprime **solo la carpeta de esa AP**.

Colócate en la carpeta **padre** de la AP (por ejemplo `bloque_1/01-PHP`) y ejecuta:

```bash
# Mac / Linux — una AP
zip -r ap1-1.zip ap1-1

# Mac / Linux — varias APs a la vez
zip -r ap1.zip ap1-1 ap1-2 ap1-3

# Windows (PowerShell o CMD) — una AP
tar -a -c -f ap1-1.zip ap1-1

# Windows — varias APs a la vez
tar -a -c -f ap1.zip ap1-1 ap1-2 ap1-3
```

Sustituye los nombres por los códigos de tus actividades. Sube el `.zip` generado a Florida Oberta.

## Mapa rápido


| Bloque | Temas                         | Prefijo carpeta  |
| ------ | ----------------------------- | ---------------- |
| 1      | 1 Refuerzo PHP, 2 POO, 3 MVC  | ap1-, ap2-, ap3- |
| 2      | 4 ORM, 5 CRUD                 | ap4-, ap5-       |
| 3      | 6 Symfony, 7 API, 8 Seguridad | ap6x, ap7x, ap8x |

