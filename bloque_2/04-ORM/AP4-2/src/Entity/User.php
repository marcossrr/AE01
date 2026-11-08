<?php

namespace AP42\Entity;


#[ORM\Entity]
#[ORM\Table(name: 'usuarios')]
class Usuario
{
    #[ORM\OneToMany(targetEntity: Operacion::class, mappedBy: 'usuario')]
    private Collection $operaciones;

    public function __construct()
    {
        $this->operaciones = new ArrayCollection();
    }

    public function getOperaciones(): Collection
    {
        return $this->operaciones;
    }
}