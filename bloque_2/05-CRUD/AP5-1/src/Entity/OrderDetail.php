<?php

namespace AP51\Entity;

use AP51\Repository\OrderDetailsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[Entity(repositoryClass: OrderDetailRepository::class)]
#[Table(name: 'order_details')]

class OrderDetail
{
    #[Id]
    #[ManyToOne(targetEntity: Order::class, inversedBy: 'orderDetails')]
    #[JoinColumn(name: 'order_id', referencedColumnName: 'id')]
    private ?Order $order = null;

    #[Id]
    #[Column(name: 'line_number', type: 'integer')]
    private ?int $lineNumber = null;

    #[ManyToOne(targetEntity: Product::class, inversedBy: 'orderDetails')]
    #[JoinColumn(name: 'product_id', referencedColumnName: 'id')]
            private Product $product;

    #[Column( name: 'unit_price', type: 'decimal', precision: 8, scale: 2)]
            private decimal $unit_price;
    #[Column(name: 'quantity', type: 'integer')]
            private int $quantity;
    #[Column(name: 'amount', type: 'decimal', precision: 8, scale: 2)]
            private decimal $amount;

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    /**
     * @return int
     */
    public function getLineNumber(): int
    {
        return $this->line_number;
    }

    /**
     * @param int $line_number
     */
    public function setLineNumber(int $line_number): void
    {
        $this->line_number = $line_number;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return decimal
     */
    public function getUnitPrice(): decimal
    {
        return $this->unit_price;
    }

    /**
     * @param decimal $unit_price
     */
    public function setUnitPrice(decimal $unit_price): void
    {
        $this->unit_price = $unit_price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return decimal
     */
    public function getAmount(): decimal
    {
        return $this->amount;
    }

    /**
     * @param decimal $amount
     */
    public function setAmount(decimal $amount): void
    {
        $this->amount = $amount;
    }


}

