<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<body>
    <h1>¡Ups! Ha ocurrido un error</h1>
    <p><?= isset($errorMessage) ? htmlspecialchars($errorMessage) : "Ruta no encontrada." ?></p>
<br>
<a href="?ruta=main">Volver al inicio</a>
</body>
</html>