<?php
//Nos devuelve la ruta de la carpeta del proyecto/src;
$currentPath = dirname(__FILE__);
//Incluimos la ruta como parte de include_path, desde src.
set_include_path(get_include_path() . PATH_SEPARATOR . $currentPath);

function autoload(string $classPath)
{
    //Remplazamos App( en este caso AP33 por ser la AP3-3) por "" y \ por /
    $classPath = str_replace(["AP33\\", "\\"], ["", "/"], $classPath);
    //Le añadimos la extensión al archivo
    $classPath .= ".php";
    //Y la incluimos
    include_once $classPath;
}

//Registramos la función
spl_autoload_register("autoload");
?>