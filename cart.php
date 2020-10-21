<?php
session_start();
$sessId = session_id();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cart_style.css">
    <title>Корзина</title>
</head>
<body>
    
    <?php
        include "config.php";
        include "index.php";
    ?>
    <form class="cartItems" method="post">
    <?php
        
        $sql = "select * from cart where sessId = '$sessId'";
        $query = mysqli_query($link, $sql);
        if($query){
           while($row = mysqli_fetch_assoc($query)){
               $goodId = $row['goodId'];
               $sql1 = "select * from goods where id = '$goodId' ";
               $select = mysqli_query($link, $sql1);
               while($row1 = mysqli_fetch_assoc($select)):?>
                    <div class="itemInfo">
                        <a href = "good.php?id=<?= $row['id']?>"><p>Товар: <?= $row1['title']?></p></a><p>Цена: <?= $row1['price']?> у.е.</p>
                    </div>
                   
               <?php
               endwhile;
           } 
        }
        else{
            echo "Ваша корзина пока что пустая!";
        }
        ?>
    <input type="submit" value="Оформить заказ" name="checkout">  
    <input type="submit" value="Очистить корзину" name="reset">
    </form>

    <?php    
    if(isset($_POST['reset'])){
        $delete = "delete from cart where sessId = '$sessId'";
        $deleteQuery = mysqli_query($link, $delete);
        if($deleteQuery){
            exit("<meta http-equiv='refresh' content='0; url= /cart.php'>");
        }
    }

    if(isset($_COOKIE['login'])){
        echo "Готовы оформить заказ {$_COOKIE['login']}?";
        }
        elseif(isset($_POST['checkout'])){

        }
    else{
        echo "Перед тем, как оформить заказ, вам необходимо аторизоваться на
            <a href = \"registration.php\">cайте<a/>! ";
        }
    
        
    ?>
</body>
</html>