<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/styles.css">
    <title>Document</title>
</head>
<body>
<?php

    include "../config/config.php";
    include "../models/model.php";
    include "header.php";
    
    $action = $_GET['action'];
    $id = $_GET['id'];
    ?>
    
<?php
    if($action == "edit"):?>
        <?php
        $row = getOneGood($link, "goods", $id);
        ?>
        <form class="editGood" action="" method="post" enctype="multipart/form-data">
            <div class="editLeft">
                <input type="text" name="title" value="<?= $row['title']?>"> 
                <img src="../public/<?= $row['img']?>">
                <input  type="file" name="img">
            </div>
            <div class="editCenter">
                <h3>Полное описание товара</h3>
                <textarea name="full_description" cols="40" rows="20"><?= nl2br($row['full_description'])?></textarea>
                <input type="text" name="price" value="<?= $row['price']?>"><br>
                <input class="button" type="submit" name="submit" value="Сохранить изменения">
            </div>
            <div class="editRight">
                <h3>Краткое описание товара</h3>
                <textarea name="part_description" cols="40" rows="20"><?= nl2br($row['part_description'])?></textarea>
            </div>
        </form>
<?php
    endif;
?>   
  
<?php
    if($action == "add"): ?>
        <form class="editGood" action="" method="post" enctype="multipart/form-data">
            <div class="editLeft">
                <p>Название товара<input type="text" name="title"></p>
                <input type="file" name="img">
            </div>
            <div class="editCenter">
                <h3>Полное описание товара</h3>
                <textarea name="full_description" cols="40" rows="20"></textarea>
                <p>Цена<input type="text" name="price"></p><br>
                <input class="button" type="submit" name="add" value="Добавить товар">
            </div>
            <div class="editRight">
                <h3>Краткое описание товара</h3>
                <textarea name="part_description" cols="40" rows="20"></textarea>
            </div>
        </form>
<?php
    endif;
    include "serv.php";
?>
    
</body>
</html>