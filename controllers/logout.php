<?php
    setcookie("login", $login, time()-3600, '/');
    setcookie("pass", $pass, time()-3600, '/');
    header("Location: ../public/index.php");
    ?>