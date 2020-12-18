<?php

namespace MyApp\Controllers;

use MyApp\App;
use MyApp\Basket;
use MyApp\Models\Admin;
use MyApp\Models\User;

abstract class Controller
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(App::instance()->getConfig()['templates']);
        $this->twig = new \Twig\Environment($loader);
    }

    public function beforeAction()
    {

        if (isset($_GET['addToBasket'])) {
            Basket::addToBasket($_GET['addToBasket']);
            [$url] = explode('?', $_SERVER['REQUEST_URI']);
            $this->redirect($url);
        }

        return true;
    }

    public function afterAction()
    {
    }

    protected function render($name, $data = [])
    {
        $data['_login'] = $_SESSION['login'];
        $data['_role'] = Admin::checkRole(User::getUserId($_SESSION['login'])['id']);
        echo $this->twig->render($name, $data);
    }

    protected function history()
    {
        $_SESSION['history'][] = $_SERVER['REQUEST_URI'];
    }

    public function adminPage($query)
    {
        $this->render('admin.twig', [
            'orders' => $query,
        ]);
    }


    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
