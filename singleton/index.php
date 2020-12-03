<?php

require "MassiveAction.php";
require "Singleton.php";

$obj = Singleton::call();

for($i = 9; $i>=7; $i--){
    $obj->action($i);
}

function oneMore(int $n){
    $obj = Singleton::call();
    $obj->action($n);
}

for($i = 1; $i<=5; $i++){
    oneMore($i*10);
}

$obj->showMas();

