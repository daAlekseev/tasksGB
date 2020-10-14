<?php
    include "config.php";
    
    $id = $_GET['id'];

    if($id){
        $sql = "update images_table SET views = views+1 where id = ('$id')";
        $query = mysqli_query($link, $sql);
    } else echo "error1";

    $views = "select views from images_table where id = ('$id')";
    $query_views = mysqli_query($link, $views);
    while($row = mysqli_fetch_assoc($query_views)){
        echo "Число просмотров:" .$row['views'];
    }

    $get_img = "select folder from images_table where id = ('$id')";
    $query_img = mysqli_query($link, $get_img);
    while($mas = mysqli_fetch_assoc($query_img)){
        echo "<img src = " .$mas['folder'] .">";
    }

    ?>

    

   