<?php

    $row = isAdmin($link, "cookies");
    $admin = $_COOKIE['login'];

    if($row['login'] == $admin):?>
            <a class="link" href="../admin/admin.php"><p>Редактирование</p></a>
            <a class="link" href="../admin/allOrders.php"><p>Управление заказами</p></a>
<?php
    endif;  
    

?>