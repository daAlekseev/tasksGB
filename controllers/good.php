<?php
   
    $id = (int)$_GET['id'];
    updateViews($link, "goods", $id);
    $item = getOneGood($link, "goods", $id);

    function changeImage($h, $w, $src, $newsrc, $type) {
        $big = "images/big/";
        $check = scandir($big);
        for($i = 2; $i < count($check); $i++){
            if($big.$check[$i] == $newsrc){
                return;
            }
        }
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

    $new_img = explode("/", $item['img'])[1];
    $type = explode(".", $new_img)[1];
    $path = $item['img'];
    $new = "images/big/".$new_img;
    changeImage(600, 600, $path, $new, $type);

    
    if(isset($_POST['toCart'])){
      $num = checkGoods($link, "cart", $sessId, $id);
      if($num > 0){
          cartUpdate($link, "cart", $sessId, $id);
      }
      else{
         cartInsert($link, "cart", $sessId, $id);
      }
    }
    
    ?>