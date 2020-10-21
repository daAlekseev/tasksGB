<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="reg.php" method="post">
        <p>Логин<br><input type="text" name="login" value="<?= $_COOKIE['login']?>"></p>
        <p>Пароль<br><input type="password" name="pass" value="<?= $_COOKIE['pass']?>"></p>
        <input type="submit" name="registration" value="Зарегестрироваться">
        <input type="submit" name="auth" value="Войти">
    </form>
</body>
</html>