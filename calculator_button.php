<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>

 <?php

    $op1 = (int)$_POST['operand_1'];
    $op2 = (int)$_POST['operand_2'];
    $res = $_POST['result'];

    if(isset($_POST['sum'])){
        $res = $op1 + $op2;
    }
    elseif(isset($_POST['sub'])){
        $res = $op1 - $op2;
    }
    elseif(isset($_POST['mul'])){
        $res = $op1 * $op2;
    }
    elseif(isset($_POST['div'])){
        if($op2 == 0){
            echo "На ноль делить нельзя!";
        }
        else {
            $res = $op1 / $op2;
            $res = round($res, 2);
        }
        
    }
    ?>  
    
    <legend>Калькулятор
    <form action="" method = "post">
        <input type="text" name="operand_1" value="<?= $op1?>" style="width:35px;">
        <input type="submit" name="sum" value="+" style="width:25px;">
        <input type="submit" name="sub" value="-" style="width:25px;">
        <input type="submit" name="mul" value="*" style="width:25px;">
        <input type="submit" name="div" value="/" style="width:25px;">
        <input type="text" name="operand_2" style="width:35px;" value="<?= $op2?>">
        <input type="text" name="result" value="<?= $res?>" readonly style="width:45px;">
    </form>
    </legend>
    


</body>
</html>