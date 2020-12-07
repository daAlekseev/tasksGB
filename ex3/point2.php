<?php

require '../vendor/autoload.php';
require 'Database.php';
require 'DatabaseInsert.php';

try {
    $obj = new DatabaseInsert();
} catch (Exception $e){
    echo $e->getMessage();
}

$name = strip_tags($_POST['userName']);
$login = strip_tags($_POST['userLogin']);
$comment = strip_tags($_POST['userComment']);

if(isset($_POST['submit'])){
    $obj->insert($name, $login, $comment);
}

try {
    $loader = new Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    echo $twig->render('point2.twig', [
        'masForm' => $obj->showAllTable("forminfo"),
    ]);
} catch (Throwable $e){
    echo $e->getMessage();
}
