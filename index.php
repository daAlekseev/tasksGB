<?php

require "Product.php";
require "DiscountProduct.php";

$mas = [
    new Product("Iphone", 1000),
    new DiscountProduct("Nokia", 500, "5%", "22 дня"),
    new DiscountProduct("Samsung", 900, "10%", "3 дня")  
];

foreach($mas as $product){
    $product->showProduct();
    echo "<hr>";
}

echo "<br> Количество товаров: " .Product::$count;