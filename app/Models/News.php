<?php


namespace App\Models;


class News
{
    private static $news = [
        [
            'id' => 1,
            'title' => 'О футболе',
            'catId' => 1,
            'key' => 'sport',
            'text' => 'Текст о футболе',
        ],
        [
            'id' => 2,
            'title' => 'О хоккее',
            'catId' => 1,
            'key' => 'sport',
            'text' => 'Текст о хоккее',
        ],
        [
            'id' => 3,
            'title' => 'О политике',
            'catId' => 2,
            'key' => 'politics',
            'text' => 'Текст о политике',
        ],
        [
            'id' => 4,
            'title' => 'О искусстве',
            'catId' => 3,
            'key' => 'art',
            'text' => 'Текст о искусстве',
        ],
    ];

    public static function getAllNews()
    {
        return static::$news;
    }

    public static function getCatNews($key)
    {
        return $result = array_filter(static::$news, function ($elem) use ($key) {
            return array_key_exists('key', $elem) && $elem['key'] == $key;
        });
    }

    public static function getItem($key, $id)
    {
        return $result = array_filter(static::$news, function ($elem) use ($key, $id) {
            return array_key_exists('key', $elem) && $elem['key'] == $key && $elem['id'] == $id;
        });
    }
}
