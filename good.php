<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles_good.css">
    <title>Товар</title>
</head>
<body>
    <h1 class="header_1">Товар</h1>
    <div class="container">

    <?php

    include "config.php";

    $id = (int)$_GET['id'];

    $sql = "select * from goods where id = $id";
    $query = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($query); 

    function changeImage($h, $w, $src, $newsrc, $type) {
        $newimg = imagecreatetruecolor($h, $w);
        imagealphablending($newimg, false);
        imagesavealpha($newimg, true);
        switch ($type) {
          case 'jpg':
            $img = imagecreatefromjpeg($src);
            imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
            imagejpeg($newimg, $newsrc);
            break;
          case 'png':
            $img = imagecreatefrompng($src);
            imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
            imagepng($newimg, $newsrc);
            break;
          case 'gif':
            $img = imagecreatefromgif($src);
            imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
            imagegif($newimg, $newsrc);
            break;
        }
    }
    
    $new_img = explode("/", $row['img'])[1];
    $type = explode(".", $new_img)[1];
    $path = $row['img'];
    $new = "images/big/".$new_img;
    changeImage(600, 600, $path, $new, $type);

        ?>
        <div class="good">
            <div class="left">
                <h3 class="header_3"><?= $row['title']?></h3>
                <img src="images/big/<?= $new_img?>">
            </div>
            <div class="right">
                <h3>Полное описание товара</h3>
                <p><?= nl2br($row['full_description'])?></p>
                <h3><?= $row['price']?> у.е.</h3>
                <input type="submit" value ="В корзину">
            </div>
        </div>
   

    </div>
</body>
</html>