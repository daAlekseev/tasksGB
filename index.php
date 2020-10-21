<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index_style.css">
    <title>Главная</title>
</head>
<body>

<div class="container_index">
    <a class="link" href="index.php"><p>Главная</p></a>
    <a class="link" href="catalog.php"><p>Каталог</p></a>
    <a class="link" href="cart.php"><p>Корзина</p></a>  
    <a class="link" href="review.php"><p>Отзывы</p></a> 
    <?php
        if(isset($_COOKIE['login'])): ?>
            <a class="link" href="lk.php"><p>Личный кабинет</p></a>
        <?else:?>
            <a class="link" href="registration.php"><p>Войти или Зарегистрироваться</p></a>   
    <?php 
        endif;
    ?>
</div>


</body>
</html>

    

