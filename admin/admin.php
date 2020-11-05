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
    $all = getAll($link, "goods"); ?>

    <div class="editContainer">
    <?php
    foreach($all as $row): ?>
        <div class="element_container">
            <div class="element"><?= $row['title']?></div>
            <div class="element"><a href="server.php?action=edit&id=<?= $row['id']?>">Редактировать</a></div>
            <div class="element"><a href="server.php?action=delete&id=<?= $row['id']?>">Удалить</a></div>
        </div>
    <?php
    endforeach;
    ?>
    <a href="server.php?action=add">Добавить товар</a>

    </div>

    <?php
    include "../templates/footer.php";
    ?>
</body>
</html>