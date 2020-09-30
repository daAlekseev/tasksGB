<?php
$a = 5;
$b = '05';
var_dump($a == $b);         // true, т.к. значения переменных равны   
var_dump((int)'012345');     // 12345, т.к. функция преобразует строку в целое число
var_dump((float)123.0 === (int)123.0); // false, т.к. значения переменных равны, но типы не равны
var_dump((int)0 === (int)'hello, world'); // true, т.к. строка преобразуется в 0, и 0 эквивалентен 0


//Меняем местами значения 2-х переменных
$a = 1;
$b = 2;

echo "<br>a = $a<br>";
echo "b = $b<br>";

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo "a = $a<br>";
echo "b = $b<br>";

?>