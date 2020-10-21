<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
<?php

    include "index.php";

    if(isset($_COOKIE['login'])){
        echo "Добро пожаловать  {$_COOKIE['login']}!";
    }

    ?>
</body>
</html>