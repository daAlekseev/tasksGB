<link rel="stylesheet" href="styles/style.css">

<?php
    
    include "config.php";

    function changeImage($h, $w, $src, $newsrc, $type) {
        $newimg = imagecreatetruecolor($h, $w);
        imagealphablending($newimg, false);
        imagesavealpha($newimg, true);
        switch ($type) {
          case 'jpeg':
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

    if(isset($_POST["submit"])){

        $image = $_FILES["picture"]["name"];
        $size = $_FILES["picture"]["size"];
        $path = BIG_PHOTO.$image;
        $path_s = SMALL_PHOTO.$image;

        if($_FILES['picture']['type'] == 'image/jpeg'||
            $_FILES['picture']['type'] == 'image/png' ||
            $_FILES['picture']['type'] == 'image/gif'){

            if(copy($_FILES["picture"]["tmp_name"], $path)){
                
                $type = explode('/', $_FILES['picture']['type'])[1];
                
                
                $insert = "insert into images_table (name, folder_s, folder, size, views) values ('$image', '$path_s', '$path', '$size', '') ";
                $query = mysqli_query($link, $insert);

                $select = "select * from images_table order by views desc";
                $query_sel = mysqli_query($link, $select);
                ?>
          <div class = "container">
              <?php
                while($mas = mysqli_fetch_array($query_sel)){
                  $param = $mas['id'];
                  echo "<a href = \"show.php?id=$param\"><img class = \"forImages\" src = " .$mas['folder_s'] ."></a><br>";
                }
                ?>
          </div>
            
        <?php
            } else echo "ne ok";
        } else echo "файл неподходящего типа";
        

    }
    else echo "error2";