<?php

$position = 0;
$sum = 0;

$data = [
    1 => 'primero',
    3 => 'segundo',
    5 => 'tercero',
    7 => 'cuarto',
    9 => 'quinto',
    11 => 'sexto',
];

foreach($data as $key => $value) {
    echo "<br> La posicion de " . $key . " es " . ($position + 1) . "<br>";
    $position++;
    if ($position % 2 == 0){
        echo "La posicion de " . $key . " es par" . "<br>";
    }else{
        echo "La posicion de " . $key . " es impar" . "<br>";
    }

    echo "La clave actual es: " . $key . "<br>" . " y el valor es: " . $value . "<br>";
}

foreach($data as $key => $value) {
    $sum = $sum + $key;
    echo "<br> La suma acumulada de la claves es: " . $sum . "<br>";
    if ($sum < 5){
        echo "La suma es < 5";
    }elseif ($sum < 10){
        echo "La suma es < 10";
    }elseif ($sum < 20){
    echo "La suma es < 20";
    }else{
        echo "La suma es > 20";
    }
}