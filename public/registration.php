<?php
    include "../models/model.php";
    include "../config/config.php";
    include "../templates/header.php"; 
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Авторизация</title>
</head>
<body>
    <form action="../controllers/reg.php" method="post" class="reg">
        <p class="joinData">Логин<br><input type="text" name="login" maxlength="20" value="<?= $_COOKIE["login"]?>"></p>
        <p class="joinData">Пароль<br><input type="password" name="pass" maxlength="20" value="<?= $_COOKIE["pass"]?>"></p>
        <input class="button" type="submit" name="registration" value="Зарегестрироваться">
        <input class="button" type="submit" name="auth" value="Войти">
    </form>
    <?php
    include "../templates/footer.php";
    ?>
</body>
</html>