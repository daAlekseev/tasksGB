<?php

require '../vendor/autoload.php';

$img = $_GET['img'];

try {
    $loader = new Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    echo $twig->render('image.twig', [
        'img' => "img/".$img,
    ]);
} catch (Throwable $e){
    echo $e->getMessage();
}
