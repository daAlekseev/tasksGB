<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/styles.css">
    <title>Document</title>
</head>
<body>
<?php

include "../config/config.php";
include "../models/model.php";
include "header.php";


$orders = getAll($link, "orders");
?>
<div class="listContainer">
<?php
foreach($orders as $row):?>
<?php
    $orderId = $row['id'];
?>
    <form class="orderList" method="post">
        <p class="text">Заказчик: <span class="info"><?= $row['customerName']?></span></p>
        <p class="text">Номер: <span class="info"><?= $row['customerNumber']?></span></p>
        <p class="text">Комментарий: <span class="info"><?= $row['customerText']?></span></p>
        <p class="text">Заказ от <span class="info"><?= $row['date']?></span></p>
        <p class="text">Товары: <span class="info"><?= $row['items']?></span></p>
        <p class="text">Сумма заказа: <span class="info"><?= $row['price']?></span></p>
        <p class="text">Состояние заказа: </p>
        <?php 
        if($row['orderState'] == 0):?>
            <input class="button" type="submit" name="accept<?= $orderId?>" value="Принять заказ">
        <?php
        else:
            echo "Данный заказ оформлен";
        endif;
        ?>
    </form>    
<?php
endforeach;

for($i=1; $i<=$orderId; $i++){
    if(isset($_POST['accept'.$i])){
        $state = acceptOrder($link, "orders", $i);
    }
    
}
?>
</div>

<?php
    // include "../templates/footer.php";
?>
</body>
</html>