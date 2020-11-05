<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Отзывы</title>
</head>
<body>
<?php
    include "../controllers/review.php"; 
    include "../templates/header.php"; 
?>
    <h3 class="header1">Отзывы наших пользователей!</h3>
    <div class="containerReview">
    
    
<?php
    foreach($getAll as $row): ?>
        <div class="part">
            <p class="text">Пользователь: <span class="info"><?= $row['user_name']?></span></p><br>
            <p class="text">Отзыв: <span class="info"><?= nl2br($row['review'])?></span></p><br>
            <p class="text">Отправлен: <span class="info"><?= $row['date']?></span></p>
        </div>
    <?php
    endforeach;
    ?>
    </div>  
      
    <h3 class="header1">Напишите свой отзыв</h3>
    <form class="review" action="" method="post">
        <p class="input">Введите имя:<br><input type="text" name="user_name" maxlength="15"></p><br>
        <p class="input">Напишите отзыв:<br><textarea name="review_text"  cols="40" rows="10" maxlength="200"></textarea></p>
        <input class="button" type="submit" name="submit">
    </form>
    <?php
    include "../templates/footer.php";
    ?>
</body>
</html>