<?php


namespace MyApp;


class Basket
{
    public static function cleanBasket()
    {
        $_SESSION['basket'] = [];
    }

    public static function getBasket()
    {
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = [];
        }

        return [
            'count' => array_sum($_SESSION['basket']),
            'goods' => $_SESSION['basket'],
        ];
    }

    public static function addToBasket($id)
    {
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = [];
        }

        $_SESSION['basket'][$id]++;
    }
}