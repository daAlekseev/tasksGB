<?php

require '../vendor/autoload.php';
require 'Database.php';

try {
    $ob = new Database();

    $loader = new Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    echo $twig->render('index.twig', [
        'imgMas' => $ob->showAllTable("galery"),
    ]);
} catch (Exception $e){
    echo $e->getMessage();
} catch (Throwable $e){
    echo $e->getMessage();
}
