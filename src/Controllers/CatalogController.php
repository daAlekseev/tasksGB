<?php

namespace MyApp\Controllers;

use MyApp\Models\Catalog;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $this->render('catalog/index.twig', [
            'categories' => Catalog::getCategories(),
        ]);
        $this->history();
    }

    public function actionCategory($params)
    {
        $catId = array_shift($params);
        $this->render('catalog/category.twig', [
            'id' => $catId,
            'category' => Catalog::getCategoryTitle($catId),
            'goods' => Catalog::getCategoryGoods($catId)
        ]);
        $this->history();
    }

    public function actionGood($params)
    {
        [$catId, $goodId] = $params;
        $this->render('catalog/good.twig', [
            'catId' => $catId,
            'goodId' => $goodId,
            'good' => Catalog::getGoodById($goodId),
        ]);
        $this->history();
    }
}
