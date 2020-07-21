<?php

namespace PHP2\Homework_2\classes;

class PhysicalWeightItem extends Item
{

    private $price;
    private $kg;

    public function __construct($price, $kg)
    {
        $this->setPrice($price);
        $this->setKg($kg);
        echo "Это товар не вес: <br>";
        echo $this->finalCost(). "<br><hr>";
    }

    protected function finalCost()
    {
        return "Стоимость товара (цена: $this->price, кол-во $this->kg кг): ". $this->getPrice() * $this->getKg();// TODO: Implement finalCost() method.
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $kg
     */
    public function setKg($kg)
    {
        $this->kg = $kg;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getKg()
    {
        return $this->kg;
    }

}