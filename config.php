<?php

    const DB_HOST = "localhost";
    const DB_NAME = "tasks";
    const DB_LOGIN = "root";
    const DB_PASS = "root";

    $link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) or die("Невозможно подключиться к бд");

   