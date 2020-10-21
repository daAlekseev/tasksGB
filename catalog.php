<?php
session_start();
$sessId = session_id();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles_catalog.css">
    <title>Каталог</title>
</head>
<body>
    <?php include "index.php";?>
    <div class="container">

    <?php

    include "config.php";

    $sql = "select * from goods";
    $query = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($query)): ?>
        <?php 
        $goodId = $row['id'];
        ?>
        <form method="post" class="good" action="">
            <div class="left">
                <h3 class="header_3"><?= $row['title']?></h3>
                <a href = "good.php?id=<?= $row['id']?>"><img src="<?= $row['img']?>"></a>
            </div>
            <div class="right">
                <h3>Описание товара</h3>
                <p><?= nl2br($row['part_description'])?></p>
                <h3><?= $row['price']?> у.е.</h3>
                <input type="submit" value ="В корзину" name="toCart<?=$goodId?>">
            </div>
        </form>
        
    <?php 
    endwhile;   
        ?>
    <?php
        for($i=1; $i<=$goodId; $i++){
            if(isset($_POST['toCart'.$i])){
                $cartInsert = "insert into cart (goodId, sessId ) values ('$i', '$sessId') ";
                $cartQuery = mysqli_query($link, $cartInsert);
                if(!$cartQuery == true){
                    echo "Что-то пошло не так!";
                }
            }
        }
        
        ?>
    </div>
</body>
</html>