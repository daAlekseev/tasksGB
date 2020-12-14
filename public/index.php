<?php

//Отображать все ошибки кроме NOTICE
error_reporting(E_ALL & ~E_NOTICE);

session_start();

require '../vendor/autoload.php';

$config = require '../config/main.php';

\MyApp\App::instance()->setConfig($config);
\MyApp\App::instance()->run();
