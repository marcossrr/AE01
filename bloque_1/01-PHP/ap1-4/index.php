<?php

calculateTriangleArea(float $base, float $height): float
calculateRectangleArea(float $base, float $height): float
calculateCircleArea(float $radius): float

<form method="POST">

    <label>Shape:</label>
    <input type="text" name="shape">

    <br><br>

    <label>Base:</label>
    <input type="number" name="base">

    <br><br>

    <label>Height:</label>
    <input type="number" name="height">

    <br><br>

    <label>Radius:</label>
    <input type="number" name="radius">

    <br><br>

    <input type="submit" value="Enviar">

</form>

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $shape = $_POST["shape"];
    $base = $_POST["base"];
    $height = $_POST["height"];
    $radius = $_POST["radius"];

}

?>

