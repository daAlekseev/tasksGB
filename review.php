<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Отзывы</title>
</head>
<body>
<?php
    
    include "config.php";
    
    $name = $_POST['user_name'];
    $review = $_POST['review_text'];

    if(isset($_POST['submit'])){
        $insert = "insert into review_table(user_name, review) values ('$name', '$review')";
        $query = mysqli_query($link, $insert);
    }
    $select = "select * from review_table";
    $query_select = mysqli_query($link, $select);
    ?>
    <div class="container">
    <h3 class="header_3">Отзывы наших пользователей!</h3>
    <?php
    while($row = mysqli_fetch_assoc($query_select)){
        echo "<div class=\"part\"><br>Пользователь: " .$row['user_name'] ."<br>Отзыв: " .nl2br($row['review']) ."<br>" .$row['date'] ."</div>";
    }
        ?>
    </div>    

    <fieldset style="width:25%;">
        <legend>Напишите свой отзыв о сайте!</legend>
        <form action="" method="post">
            <p>Введите имя:<br><input type="text" name="user_name"></p><br>
            <p>Напишите отзыв:<br><textarea name="review_text"  cols="30" rows="10"></textarea></p>
            <input type="submit" name="submit">
        </form>
    </fieldset>
</body>
</html>