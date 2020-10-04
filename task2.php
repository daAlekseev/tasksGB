<?php
    //1-ый пункк
    $a = rand(-10,10);
    $b = rand(-10,10);
    echo "$a и $b<br>"; 
    if($a>=0 && $b>=0){
        echo $a - $b."<hr>";
    }
    elseif($a<0 && $b<0){
        echo $a * $b."<hr>";
    }
    else{
        echo $a + $b."<hr>";
    }

    //2-ой пункт
    $a = rand(0,15);
    switch($a){
        case 0: echo "0 ";
        case 1: echo "1 ";
        case 2: echo "2 ";
        case 3: echo "3 ";
        case 4: echo "4 ";
        case 5: echo "5 ";
        case 6: echo "6 ";
        case 7: echo "7 ";
        case 8: echo "8 ";
        case 9: echo "9 ";
        case 10: echo "10 ";
        case 11: echo "11 ";
        case 12: echo "12 ";
        case 13: echo "13 ";
        case 14: echo "14 ";
        case 15: echo "15 <hr>";
    }

    //2-ой пункт через рекурсию 
    function f($v){
        if($v > 15){
            return;
        }
        echo "$v ";
        f($v+1);
    }
    f(rand(0,15));

    //3-ий и 4-ый пункты
    function sum($arg1, $arg2){
        return $arg1 + $arg2;
    }

    function sub($arg1, $arg2){
        return $arg1 - $arg2;
    }

    function mul($arg1, $arg2){
        return $arg1 * $arg2;
    }

    function div($arg1, $arg2){
        return $arg1 / $arg2;
    }

    function mathOperation($arg1, $arg2, $operation){
        switch($operation){
            case "+": return sum($arg1,$arg2);
            case "-": return sub($arg1,$arg2);
            case "*": return mul($arg1,$arg2);
            case "/": return div($arg1,$arg2);
            default: echo "<hr>Неподходящая операция!";
        }
    }
    echo "<hr>" .mathOperation(10,20,"*");

    //6-ой пункт
    $val1 = 1;

    function power($val, $pow){
        global $val1;

        if($pow < 1){
            return $val1;
        }
        $val1 *= $val;
    
        return power($val, $pow-1);
    }

    echo "<hr>" .power(2, 6);

    //7-ой пункт
    function timeCase(){
        $hour = date('H');
        if($hour>=5 && $hour<=20 || $hour == 0){
            echo "<hr>Сейчас $hour часов";
        }
        elseif($hour % 10 == 1 && $hour != 11){
            echo "<hr>Сейчас $hour час";
        }
        else{
            echo "<hr>Сейчас $hour часа";
        }

        $min = date('i');
        if($min % 10 == 1 && $min != 11){
            echo " $min минута";
        }
        elseif($min % 10 == 2 && $min !=12 || $min % 10 == 3 && $min !=13 || 
                $min % 10 == 4 && $min !=14){
                    echo " $min минуты";
                }
        else{
            echo " $min минут";
        }
    }

    timeCase();
    
    ?>

     