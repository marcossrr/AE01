<?php

namespace AP51\Entity;

use AP51\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[Entity(repositoryClass: OrderRepository::class)]
#[Table(name: 'orders')]

class Order
{
    #[Id]
    #[GeneratedValue(strategy: 'NONE')]
    #[Column(name: 'id', type: 'integer')]
            private ?int $id;

    #[Column(name: 'order_date', type: 'date')]
            private \DateTime $order_date;
    #[Column(name: 'order_type', type: 'char')]
            private string $order_type;
    #[ManyToOne(targetEntity: Client::class, inversedBy: 'orders')]
    #[JoinColumn(name: 'client_id', referencedColumnName: 'id')]
            private Client $client;
    #[Column(name: 'shipping_date', type: 'date')]
            private \DateTime $shipping_date;
    #[Column(name: 'total', type: 'decimal', precision: 8, scale: 2 )]
            private decimal $total;

    #[OneToMany(mappedBy: 'order', targetEntity: OrderDetail::class)]
    private Collection $orderDetails;

    public function __construct()
    {
        $this->orderDetails = new ArrayCollection();
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
     * @return \DateTime
     */
    public function getOrderDate(): \DateTime
    {
        return $this->order_date;
    }

    /**
     * @param \DateTime $order_date
     */
    public function setOrderDate(\DateTime $order_date): void
    {
        $this->order_date = $order_date;
    }

    /**
     * @return string
     */
    public function getOrderType(): string
    {
        return $this->order_type;
    }

    /**
     * @param string $order_type
     */
    public function setOrderType(string $order_type): void
    {
        $this->order_type = $order_type;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return \DateTime
     */
    public function getShippingDate(): \DateTime
    {
        return $this->shipping_date;
    }

    /**
     * @param \DateTime $shipping_date
     */
    public function setShippingDate(\DateTime $shipping_date): void
    {
        $this->shipping_date = $shipping_date;
    }

    /**
     * @return decimal
     */
    public function getTotal(): decimal
    {
        return $this->total;
    }

    /**
     * @param decimal $total
     */
    public function setTotal(decimal $total): void
    {
        $this->total = $total;
    }

    /**
     * @return Collection
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    /**
     * @param Collection $orderDetails
     */
    public function setOrderDetails(Collection $orderDetails): void
    {
        $this->orderDetails = $orderDetails;
    }


}