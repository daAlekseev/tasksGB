<?php 
include "../controllers/session.php";
include "../config/config.php";
include "../models/model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Каталог</title>
</head>
<body>
    <?php 
    include "../templates/header.php";
    ?>
    <div class="container_catalog">
    <?php
    $getAll = getAll($link, "goods");
    
    foreach($getAll as $row): ?>
    <?php
    $goodId = $row['id'];
    ?>
        <form method="post" class="item" action="">
            <div class="left">
                <h3 class="header_3"><?= $row['title']?></h3>
                <a href = "good.php?id=<?= $row['id']?>"><img src="<?= $row['img']?>"></a>
            </div>
            <div class="right">
                <h3 class="header_3">Описание товара</h3>
                <p><?= nl2br($row['part_description'])?></p>
                <h3><?= $row['price']?> у.е.</h3>
                <input class="button" type="submit" value ="В корзину" name="toCart<?=$goodId?>">
            </div>
        </form>
    <?php 
    endforeach; 
    include "../controllers/toCart.php";
    
    ?>
    
   
    </div>
    <?php
    include "../templates/footer.php";
    ?>
</body>
</html>