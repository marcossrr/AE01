<?php

declare(strict_types=1);
class Formula {
    protected $piloto;
    protected $escuderia;
    protected $color;

    public function __construct($piloto, $escuderia, $color){
    $this->piloto = $piloto;
    $this->escuderia = $escuderia;
    $this->color = $color;
    }

    public function __destruct(){
}

class Uno extends Formula {
    private $drs;
    private $aceleron;

    public function __construct($piloto, $escuderia, $color, $drs, $aceleron)
    {
        parent::__construct($piloto, $escuderia, $color);
        $this->drs = $drs;
        $this->aceleron = $aceleron;
    }
}

class dos extends Formula {
    private $bateria;
    private $reacarga;

    public function __construct($piloto, $escuderia, $color, $drs, $aceleron)
    {
        parent::__construct($piloto, $escuderia, $color);
        $this->bateria = $bateria;
        $this->recarga = $reacarga;
    }
}
}
