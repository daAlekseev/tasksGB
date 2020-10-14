<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка изображений</title>
</head>
<body>

    <form action = "server.php" method="post" enctype="multipart/form-data">
        <input type="file" name="picture"><br>
        <input type="submit" name = "submit" value="Загрузить">
    </form>

</body>
</html>