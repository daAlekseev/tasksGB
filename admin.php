<link rel="stylesheet" href="styles/admin_style.css">

<?php

    include "config.php";

    $sql = "select * from goods";
    $query = mysqli_query($link, $sql); ?>

    <div class="container">
    <?php
    while($row = mysqli_fetch_assoc($query)): ?>
        <div class="element_container">
            <div class="element"><?= $row['title']?></div>
            <div class="element"><a href="server.php?action=edit&id=<?= $row['id']?>">Редактировать</a></div>
            <div class="element"><a href="server.php?action=delete&id=<?= $row['id']?>">Удалить</a></div>
        </div>
       
        
    <?php
    endwhile;
    ?>

    </div>