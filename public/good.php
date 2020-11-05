<?php
    include "../controllers/session.php";
    include "../config/config.php";
    include "../models/model.php";
    include "../controllers/good.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Товар</title>
</head>
<body>
    <?php 
    include "../templates/header.php";
    ?>
    <form method="post" class="container_catalog" action="">
        <div class="oneItem">
            <div class="left">
                <h3 class="header_3"><?= $item['title']?></h3>
                <img src="images/big/<?= $new_img?>">
            </div>
            <div class="right">
                <h3 class="header_3">Полное описание товара</h3>
                <p><?= nl2br($item['full_description'])?></p>
                <h3><?= $item['price']?> у.е.</h3>
                <input class="button" type="submit" name="toCart" value ="В корзину">
            </div>
        </div>
        
    </form>
    <?php
    include "../templates/footer.php";
    ?>
</body>
</html>