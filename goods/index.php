<?php

require "GoodInterface.php";
require "Good.php";
require "DigitalGood.php";
require "PhysicalGood.php";
require "WeightGood.php";



$items = [
    new DigitalGood("Цифровой товар", 1000),
    new PhysicalGood("Физический товар", 1000),
    new WeightGood("Весовой товар", 1000, 2),
    new DigitalGood("Еще один цифровой товар", 3000),
];

foreach($items as $item){
    $item->priceCounter();
    $item->goodPrice();
}

