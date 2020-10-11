<?php
    $path = $_GET['path'];
    $images = scandir("img");
?>
    
    <img src = "img/<?=$images[$path]?>" width="40%">