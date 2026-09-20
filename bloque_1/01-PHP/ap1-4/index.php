<?php
// --- 1. FUNCIONES TIPADAS PARA CADA CÁLCULO ---
// En PHP 7/8 indicamos el tipo de los parámetros (: float) y lo que devuelve la función

function areaTriangulo(float $base, float $altura): float {
    return ($base * $altura) / 2;
}

function areaRectangulo(float $base, float $altura): float {
    return $base * $altura;
}

function areaCirculo(float $radio): float {
    return M_PI * ($radio ** 2); // M_PI es la constante de PHP para Pi
}

// --- 2. INICIALIZACIÓN DE VARIABLES ---
$mensajeError = "";
$resultado = null;

// Recogemos el valor de la figura enviada (si no hay envío, se queda vacío)
$shape = $_POST['shape'] ?? '';

// --- 3. PROCESAR SOLO SI EL MÉTODO ES POST ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validamos que se haya seleccionado una figura válida
    if ($shape === 'triangle') {
        // Leemos los datos que necesita el triángulo
        $base = $_POST['base'] ?? '';
        $height = $_POST['height'] ?? '';

        // Validamos que sean numéricos y mayores que cero
        if (is_numeric($base) && $base > 0 && is_numeric($height) && $height > 0) {
            // Convertimos a float (cast) y llamamos a la función
            $resultado = areaTriangulo((float)$base, (float)$height);
        } else {
            $mensajeError = "Para el triángulo, la base y la altura deben ser números mayores que cero.";
        }

    } elseif ($shape === 'rectangle') {
        // Leemos los datos que necesita el rectángulo
        $base = $_POST['base'] ?? '';
        $height = $_POST['height'] ?? '';

        if (is_numeric($base) && $base > 0 && is_numeric($height) && $height > 0) {
            $resultado = areaRectangulo((float)$base, (float)$height);
        } else {
            $mensajeError = "Para el rectángulo, la base y la altura deben ser números mayores que cero.";
        }

    } elseif ($shape === 'circle') {
        // Leemos el dato que necesita el círculo (las demás variables se ignoran)
        $radius = $_POST['radius'] ?? '';

        if (is_numeric($radius) && $radius > 0) {
            $resultado = areaCirculo((float)$radius);
        } else {
            $mensajeError = "Para el círculo, el radio debe ser un número mayor que cero.";
        }

    } else {
        $mensajeError = "Por favor, selecciona una figura correcta de la lista.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Áreas - DAW 1</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .campo { margin-bottom: 12px; }
        label { display: inline-block; width: 80px; }
        .error { color: red; font-weight: bold; }
        .exito { color: green; font-weight: bold; }
    </style>
</head>
<body>

<h2>Calculadora de Áreas</h2>

<!-- Mostrar error si la validación falla -->
<?php if ($mensajeError !== ""): ?>
    <p class="error"><?= $mensajeError ?></p>
<?php endif; ?>

<!-- Mostrar el resultado si el cálculo fue correcto -->
<?php if ($resultado !== null): ?>
    <p class="exito">El área calculada es: <?= round($resultado, 2) ?></p>
<?php endif; ?>

<!-- Formulario enviado mediante POST a este mismo archivo -->
<form action="" method="POST">

    <div class="campo">
        <label for="shape">Figura:</label>
        <select name="shape" id="shape">
            <option value="">--Selecciona--</option>
            <option value="triangle" <?= $shape === 'triangle' ? 'selected' : '' ?>>Triángulo</option>
            <option value="rectangle" <?= $shape === 'rectangle' ? 'selected' : '' ?>>Rectángulo</option>
            <option value="circle" <?= $shape === 'circle' ? 'selected' : '' ?>>Círculo</option>
        </select>
    </div>

    <div class="campo">
        <label for="base">Base:</label>
        <input type="text" name="base" id="base" value="<?= $_POST['base'] ?? '' ?>">
    </div>

    <div class="campo">
        <label for="height">Altura:</label>
        <input type="text" name="height" id="height" value="<?= $_POST['height'] ?? '' ?>">
    </div>

    <div class="campo">
        <label for="radius">Radio:</label>
        <input type="text" name="radius" id="radius" value="<?= $_POST['radius'] ?? '' ?>">
    </div>

    <button type="submit">Calcular</button>
</form>

</body>
</html>

