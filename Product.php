<?php

class Product{
    public static $count;
    private $price;
    private $name;

    public function __construct($name, $price){
        $this->price = $price;
        $this->name = $name;
        self::$count++; 
        $this->number = self::$count;
    }

    public function showProduct(){
        echo "Товар номер $this->number<br>Наименование товара: $this->name. <br>Цена товара: $this->price. ";
    }
}