<?php

namespace AP42\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'operaciones')]
class Operacion
{
    #[ORM\ManyToOne(targetEntity: Usuario::class, inversedBy: 'operaciones')]
    #[ORM\JoinColumn(name: 'usuario', referencedColumnName: 'id', nullable: false)]
    private ?Usuario $usuario = null;

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }
}