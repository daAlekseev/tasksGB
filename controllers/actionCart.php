<?php
    if(isset($_POST['reset'])){
        $reset = actionCart($link, "delete", "cart", $sessId);
        if($reset){
            exit("<meta http-equiv='refresh' content='0; url= /public/cart.php'>");
        }
    }


    if(isset($_POST['checkout'])): ?>
        <form action="" method="post" class="userData">
            <p>Имя или Логин(для авторизованных пользователей):<br><input type="text" maxlength="20" name="customerName" value ="<?= $_COOKIE['login']?>"></p>
            <p>Контактный телефон:<br> <input type="text" name="customerNumber" maxlength="15"></p>
            <p>Комментарий к заказу:<br><textarea name="customerText"  cols="60" rows="10"></textarea></p>
            <input class="button" type="submit" name="submitInfo" value="Подтвердить">
        </form>
    <?php
    endif;
    if(isset($_POST['submitInfo'])){
        $customerName = strip_tags($_POST['customerName']);
        $customerNumber = strip_tags($_POST['customerNumber']);
        $customerText = strip_tags($_POST['customerText']);
        $checkout = checkoutOrder($link, "orders", $customerName, $customerNumber, $customerText, $items, $sum);
        if($checkout){
            echo "<meta http-equiv='refresh' content='2; url= /public/cart.php'>";
            $reset = actionCart($link, "delete", "cart", $sessId);
            if($reset){
                echo "Ваш заказ оформлен и подтвержден! Наши консультанты с вами свяжутся!";
            }
        }  
    }

?>