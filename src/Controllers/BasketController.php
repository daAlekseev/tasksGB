<?php


namespace MyApp\Controllers;

use MyApp\Basket;
use MyApp\Models\Catalog;
use MyApp\Models\Order;
use MyApp\Models\User;


class BasketController extends Controller
{
    public function actionIndex()
    {
        $this->history();
        $basket = Basket::getBasket();
        $ids = array_keys($basket['goods']);
        $goods = Catalog::getGoodsByIds($ids);
        $sum = 0;
        foreach ($goods as $k => $v) {
            $count = $basket['goods'][$v['id']];
            $goods[$k]['count'] = $count;
            $sum += $goods[$k]['sum'] = $count * $v['price'];
        }
        $this->render('basket/index.twig', [
            'sum' => $sum,
            'goods' => $goods,
        ]);
    }

    public function actionOrder()
    {
        $user = User::getUserId($_SESSION['login']);

        if (!$_SESSION['login']) {
            $this->redirect('/login');
        }

        Order::make($user['id'], Basket::getBasket()['goods']);
        Basket::cleanBasket();

        $this->render('basket/success.twig');
    }
}