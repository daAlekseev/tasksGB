<?php
    
$path = $_GET['path'];
$images = scandir("formBig");
?>

<img src = "formBig/<?=$images[$path]?>" >