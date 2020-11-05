<div class="container_header">
    <a class="link" href="index.php"><p>Главная</p></a>
    <a class="link" href="catalog.php"><p>Каталог</p></a>
    <a class="link" href="cart.php"><p>Корзина</p></a>  
    <a class="link" href="review.php"><p>Отзывы</p></a> 
    <?php
     
        include "../controllers/isAdmin.php";
        
        if(isset($_COOKIE["login"])): ?>
            <a class="link" href="lk.php"><p>Личный кабинет</p></a>
       
            <a class="link" href="../controllers/logout.php"><p>Выйти</p></a>
        <?php 
        else:?>
            <a class="link" href="registration.php"><p>Войти или Зарегистрироваться</p></a>   
    <?php 
        endif;
    ?>
</div>


    

