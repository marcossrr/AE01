<?php

var_dump($_GET);
echo "<br>";
foreach ($_GET as $clave => $valor){
    echo "Se ha recibido" . $valor . "para la clave" . $clave . "<br>";
}