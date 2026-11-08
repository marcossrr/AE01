<?php

namespace AP51\Entity;

use AP51\Repository\ClientsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[Entity(repositoryClass: ClientsRepository::class)]
#[Table(name: 'clients')]

class Clients
{
    #[Id]
    #[GeneratedValue(strategy: 'NONE')]
    #[Column(name: 'id', type: 'integer')]
            private ?int $id;
    #[Column(name: 'name', type: 'string', length: 45)]
            private string $name;
    #[Column(name: 'addres', type: 'string', length: 60)]
            private string $addres;
    #[Column(name: 'city', type: 'string', length: '30')]
            private string $city;
    #[Column(name: 'postal_code', type: 'string', length: '10')]
            private string $postal_code;
    #[Column(name: 'telephone', type: 'string', length: '15')]
            private string $telephone;
    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: Pedido::class)]
    private Collection $pedidos;

    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddres(): string
    {
        return $this->addres;
    }

    /**
     * @param string $addres
     */
    public function setAddres(string $addres): void
    {
        $this->addres = $addres;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    /**
     * @param string $postal_code
     */
    public function setPostalCode(string $postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return Collection
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    /**
     * @param Collection $pedidos
     */
    public function setPedidos(Collection $pedidos): void
    {
        $this->pedidos = $pedidos;
    }


}