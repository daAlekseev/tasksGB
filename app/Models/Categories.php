<?php


namespace App\Models;


class Categories
{
    private static $categories = [
        [
            'id' => 1,
            'key' => 'sport',
            'title' => 'Спорт',
        ],
        [
            'id' => 2,
            'key' => 'politics',
            'title' => 'Политика',
        ],
        [
            'id' => 3,
            'key' => 'art',
            'title' => 'Искусство',
        ],
    ];

    public static function getCategories()
    {
        return static::$categories;
    }

}
