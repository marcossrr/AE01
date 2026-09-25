<?php

declare(strict_types=1);
class Formula {
    protected $arrancado;
    protected $velocidad;

    public function __construct($arrancado, $velocidad){
        $this->arrancado = $arrancado;
        $this->velocidad = $velocidad;
    }

    public function arrancar(){
        if ($this->arrancado === false) {
            return $this->arrancado = true;
        }
    }

    public function detener(){
        if($this->arrancado === true){
            return $this->arrancado = false;
        }
    }

    public function acelerar(){
        $this->velocidad = $this->velocidad + 10;
    }
    public function mostrarEstado(){
        if($this->arrancado === true){
            echo "<br> Tu coche esta arrancado <br>";
        }else{
            echo "<br> Tu coche esta apagado <br>";
        }
        if($this->arrancado === false){
            $this->velocidad = 0;
            echo "<br>Enciende el coche.<br>";
        }else{
            echo "<br> Tu velocidad es: " . $this->velocidad . "<br>";
    }
}

    public function __destruct(){
        return "<br> Tu coche ha salido de la carrera <br>";
}
}

class Gasolina extends Formula {
    private $drs;
    private $aceleron;

    public function __construct($arrancado, $velocidad, $drs, $aceleron)
    {
        parent::__construct($arrancado, $velocidad);
        $this->drs = $drs;
        $this->aceleron = $aceleron;
    }
}

class Electrico extends Formula {
    private $bateria;
    private $recarga;

    public function __construct($arrancado, $velocidad, $bateria, $reacarga)
    {
        parent::__construct($arrancado, $velocidad);
        $this->bateria = $bateria;
        $this->recarga = $reacarga;
    }
}

$coche1 = new Formula(arrancado: false, velocidad: 60);
$coche2 = new Formula(arrancado: true, velocidad: 60);



$coche1->acelerar();
$coche2->acelerar();

$coche1->mostrarEstado();
$coche2->mostrarEstado();

