<?php

abstract class Good implements GoodInterface
{
    protected $name;
    protected $price;
    protected $weight;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function priceCounter();

    public function goodPrice()
    {
        echo  $this->name . ' стоимостью = ' . $this->price  . '<br>';  
    }
}
