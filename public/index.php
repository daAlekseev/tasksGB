<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Главная</title>
</head>
<body>
    <?php 
    include "../config/config.php";
    include "../models/model.php";
    include "../templates/header.php";
    
    $row = getMostPopular($link, "goods");
    $low = getLowPrice($link, "goods");
    ?>

   

    <div class="container">
        <div class="head">    
            <h1 class="header1 main">Самый популярный товар</h1>
            <div class="good">
                <div class="left">
                    <h3 class="header_3"><?= $row['title']?></h3>
                    <a href = "good.php?id=<?= $row['id']?>"><img src="<?= $row['img']?>"></a>
                </div>
                <div class="right">
                    <h3 class="header_3">Описание товара</h3>
                    <p><?= nl2br($row['part_description'])?></p>
                    <h3><?= $row['price']?> у.е.</h3>
                </div>
            </div>
        </div>

        <div class="head">
            <h1 class="header1 main">Самая низкая цена</h1>
            <div class="good">
                <div class="left">
                    <h3 class="header_3"><?= $low['title']?></h3>
                    <a href = "good.php?id=<?= $low['id']?>"><img src="<?= $low['img']?>"></a>
                </div>
                <div class="right">
                    <h3 class="header_3">Описание товара</h3>
                    <p><?= nl2br($low['part_description'])?></p>
                    <h3><?= $low['price']?> у.е.</h3>
                </div>
            </div>
        </div>
        <div class="stock">
            <h3 class="header_3">Акция</h3>
            <p>В нашем магазине вы можете получить скидку при покупке от 3-х товаров, акция действует только в будние дни недели.</p>
        </div>
    </div>
    <?php
    include "../templates/footer.php";
    ?>
</body>
</html>