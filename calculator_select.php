<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>

<?php

    if(isset($_POST['equally'])){

        $op1 = (int)$_POST['operand_1'];
        $op2 = (int)$_POST['operand_2'];
        $res = $_POST['result'];

        if($_POST['operation'] == "sum"){
            $res = $op1 + $op2;
        }
        elseif($_POST['operation'] == "sub"){
            $res = $op1 - $op2;
        }
        elseif($_POST['operation'] == "mul"){
            $res = $op1 * $op2;
        }
        elseif($_POST['operation'] == "div"){
            if($op2 == 0){
                echo "На ноль делить нельзя!";
            }
            else{
                $res = $op1 / $op2;
                $res = round($res,2);
            }
        }
    }
    ?>
    
    
    <legend>Калькулятор
    <form action="" method = "post">
        <input type="text" name="operand_1" value="<?= $op1?>" style="width:35px;">
        <select name="operation">
            <option value="sum">+</option>
            <option value="sub">-</option>
            <option value="mul">*</option>
            <option value="div">/</option>
        </select>
        <input type="text" name="operand_2" style="width:35px;" value="<?= $op2?>">
        <input type="submit" value="=" name="equally">
        <input type="text" name="result" value="<?= $res?>" readonly style="width:45px;">
    </form>
    </legend>
    


</body>
</html>