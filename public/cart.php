<?php
    session_start();
    $sessId = session_id(); 
    
    include "../models/model.php";
    include "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Корзина</title>
</head>
<body>
    <div class="fullCart">
    <?php
        include "../templates/header.php";
    ?>
    <form class="cartItems" method="post">
        <?php 
            include "../controllers/itemsCart.php";
        ?>
        <input type="submit" value="Оформить заказ" class="button" name="checkout">  
        <input type="submit" value="Очистить корзину" class="button" name="reset">
    </form>
    <?php 
        include "../controllers/actionCart.php";
        
        ?>
    </div>
    <?php
    include "../templates/footer.php";
    ?>
</body>
</html>