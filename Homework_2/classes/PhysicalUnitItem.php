<?php

namespace PHP2\Homework_2\classes;

class PhysicalUnitItem extends Item
{
    private $price;
    private $quantity;

    public function __construct($quantity)
    {
        $this->setPrice();
        $this->setQuantity($quantity);
        echo "Это штучный товар: <br>";
        echo $this->finalCost(). "<br><hr>";
    }

    protected function finalCost()
    {
        return "Стоимость товара (цена: $this->price, кол-во $this->quantity): ". $this->getPrice() * $this->getQuantity();// TODO: Implement finalCost() method.
    }

    /**
     * @param mixed $price
     */
    public function setPrice()
    {
        $this->price = 2 * DigitalItem::price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}