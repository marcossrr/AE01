<?php
var_dump($_GET);
echo "<br>";
foreach ($_GET as $key => $value){
    if( trim($value) === "" ){
        $type = "vacio";
    }elseif(is_numeric($value)){
        $type = "numerico";
    }else{
        $type = "texto";
    }
    echo "La clave es:" . $key . "<br>";
    echo "El valor es:" . $value . "<br>";
    echo "El tipo es:" . $type . "<br>";
}