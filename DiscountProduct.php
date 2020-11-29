<?php

class DiscountProduct extends Product{
    private $discount;
    private $discountTime;

    public function __construct($name, $price, $discount, $discountTime){
        parent::__construct($name, $price);
        $this->discount = $discount;
        $this->discountTime = $discountTime;
    }

    public function showProduct(){
        echo "<br>";
        parent::showProduct();
        echo "<br>Скидка: $this->discount. <br>Скидка действует: $this->discountTime. ";
    }
}