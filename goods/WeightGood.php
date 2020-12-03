<?php

class WeightGood extends Good
{
   public function __construct(string $name, int $price, int $weight)
   {
       parent::__construct($name, $price);
       $this->weight = $weight;
   }

    public function priceCounter() : int
    {
        return  $this->price *= $this->weight;
    }   
}
