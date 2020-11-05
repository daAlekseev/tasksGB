<?php

if($action == "delete"){
    $delete = deleteOneGood($link, "goods", $id);
    if($delete){
        exit("<meta http-equiv='refresh' content='0; url= /admin/admin.php'>");
    }
}

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $full_description = $_POST['full_description'];
    $part_description = $_POST['part_description'];
    $price = $_POST['price'];
    $img = $_FILES["img"]["name"];
    $image = $row['img'];
    $path = "../public/images/".$img;

if($_FILES['img']['type'] == 'image/jpeg'||
    $_FILES['img']['type'] == 'image/png' ||
    $_FILES['img']['type'] == 'image/gif'){
    if(copy($_FILES["img"]["tmp_name"], $path)){
        $update = editGood($link, "goods", $title, "images/".$img, $price, $full_description, $part_description, $id);
        if($update){
            exit("<meta http-equiv='refresh' content='0; url= /admin/admin.php'>");
        }
        else{
            echo "Ошибка сохранения данных!";
            die(mysqli_error($link));
        }
    }
    else{echo "Ошибка при копировании фото!";}
}elseif($image){
    $update = editGood($link, "goods", $title, $image, $price, $full_description, $part_description, $id);
    if($update){
        exit("<meta http-equiv='refresh' content='0; url= /admin/admin.php'>");
    }
    else{
        echo "Ошибка сохранения данных!";
        die(mysqli_error($link));
    }
}
else{
    echo "Неподходящий тип картинки!";
}

    }                   

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $fullDescription = $_POST['full_description'];
    $partDescription = $_POST['part_description'];
    $price = $_POST['price'];
    $img = $_FILES["img"]["name"];
    $path = "../public/images/".$img;
    if($_FILES['img']['type'] == 'image/jpeg'||
        $_FILES['img']['type'] == 'image/png' ||
        $_FILES['img']['type'] == 'image/gif'){
        if(copy($_FILES["img"]["tmp_name"], $path)){
            $add = addNewGood($link, "goods", $title, $img, $price, $partDescription, $fullDescription);
            if($add){
                exit("<meta http-equiv='refresh' content='0; url= /admin/admin.php'>");
            }
            else{
                echo "Ошибка сохранения данных!";
            }
        }
        else{echo "Ошибка при копировании фото!";}
        }
    else{
    echo "Неверный формат изображения";
    }
}