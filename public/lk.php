<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Личный кабинет</title>
</head>
<body>
<?php
    include "../models/model.php";
    include "../config/config.php";
    include "../templates/header.php";
    $customerName = $_COOKIE['login'];
?>
    <div class="containerCart">
        <p>Ваша история заказов, <?= $customerName?></p>
<?php
    $orders = customerOrders($link, "orders", $customerName);
    foreach($orders as $row):?>
        <div class="order">
            <p class="text">Заказ от <span class="info"><?= $row['date']?></span></p>
            <p class="text">Товары: <span class="info"><?= $row['items']?></span></p>
            <p class="text">Сумма заказа: <span class="info"><?= $row['price']?> у.е.</span></p>
        </div>    
<?php
    endforeach;
?>
    </div>
    <?php
    include "../templates/footer.php";
    ?>
</body>
</html>