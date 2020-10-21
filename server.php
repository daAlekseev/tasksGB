<link rel="stylesheet" href="styles/styles_catalog.css">

<?php

    include "config.php";
    
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == "delete"){
        $sql = "delete from goods where id = $id";
        if(mysqli_query($link,$sql)){
            exit("<meta http-equiv='refresh' content='0; url= /admin.php'>");
        }
    }
    ?>
    
    <?php

    if($action == "edit"){
        
        $sql_select = "select * from goods where id = $id";
        $query = mysqli_query($link, $sql_select);
        $row = mysqli_fetch_assoc($query); 
        ?>


        <h1 class="header_1">Товар</h1>
        <div class="container">
            
            <form class="good" action="" method="post">
                <div class="left">
                    <input type="text" name="title" value="<?= $row['title']?>"> 
                    <img src="<?= $row['img']?>">
                </div>
                <div class="right">
                    <h3>Полное описание товара</h3>
                    <textarea name="full_description" cols="40" rows="20"><?= nl2br($row['full_description'])?></textarea>
                    <input type="text" name="price" value="<?= $row['price']?>"><br>
                    <input type="submit" name="submit" value="Сохранить изменения">
                </div>
            </form>
        </div>
        <?php
    
            $title = $_POST['title'];
            $full_description = $_POST['full_description'];
            $price = $_POST['price'];
    
            if(isset($_POST['submit'])){
                $sql_update = "update `goods` set `title` = '$title', price = $price, `full_description` = '$full_description' where id = $id ";
                if(mysqli_query($link,$sql_update)){
                    exit("<meta http-equiv='refresh' content='0; url= /admin.php'>");
                }
                else{
                    echo "Ошибка сохранения данных!";
                }
    
            }
        }
            ?>
    