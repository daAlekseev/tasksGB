<?php


namespace Models;

use MyApp\Models\Catalog;

final class CatalogTest extends \BaseTest
{
    public function testGetCategoryTitle()
    {
        $categories = Catalog::getCategories();
        $expected = array_shift($categories);
        $this->assertEquals($expected['title'], Catalog::getCategoryTitle($expected['id']));
    }

    public function testGetGoodById()
    {
        $goods = Catalog::getCategoryGoods(1);
        $expected = array_shift($goods);
        $this->assertEquals($expected, Catalog::getGoodById($expected['good_id']));
    }

    public function testGetGoodsByIds()
    {
        $actual = Catalog::getGoodsByIds([]);
        $this->assertIsArray($actual);
        $this->assertEmpty($actual);
    }
}

