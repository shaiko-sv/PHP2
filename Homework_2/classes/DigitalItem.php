<?php

namespace PHP2\Homework_2\classes;

class DigitalItem extends Item
{
    const price = 50;
    private $quantity;

    public function __construct($quantity)
    {
        echo "Это цифровой товар: <br>";
        $this->setQuantity($quantity);
        echo $this->finalCost(). "<br><hr>";
    }

    protected function finalCost()
    {
        return "Стоимость товара (цена: ". self::price. ", кол-во $this->quantity): ". self::price * $this->getQuantity();// TODO: Implement finalCost() method.
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