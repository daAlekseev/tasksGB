<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

<h1>Галерея с указанием свойства width</h1>
<div class = "container">
<?php
    $images = scandir("img");

    for($i = 2; $i < count($images); $i++): ?>
        <a href="server.php?path=<?=$i?>"><img src = "img/<?=$images[$i]?>" class = "forImages"></a>
<?php
    endfor;
?>
</div>

<h1>Галерея без указания свойства width</h1>
<div class="container2">
<?php
    $images = scandir("small");
    for($i = 2; $i < count($images); $i++): ?>
        <a href="server1.php?path=<?=$i?>"><img src = "small/<?=$images[$i]?>" class="forImages2"></a>
<?php
    endfor;
?>
</div>

<h1>Галерея через загрузку файлов</h1>
<form action = "server3.php" method="post" enctype="multipart/form-data">
<input type="file" name="picture">
<br>
<input type="submit" value="Загрузить">
</form>


</body>

</html>