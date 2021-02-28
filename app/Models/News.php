<?php



namespace App\Models;

use App\Models\Categories;

class News
{
    private array $news = [
        1 => [
            'id' => 1,
            'title' => 'О футболе',
            'catId' => 1,
            'slug' => 'sport',
            'text' => 'Текст о футболе',
        ],
        2 => [
            'id' => 2,
            'title' => 'О хоккее',
            'catId' => 1,
            'slug' => 'sport',
            'text' => 'Текст о хоккее',
        ],
        3 => [
            'id' => 3,
            'title' => 'О политике',
            'catId' => 2,
            'slug' => 'politics',
            'text' => 'Текст о политике',
        ],
        4 => [
            'id' => 4,
            'title' => 'О искусстве',
            'catId' => 3,
            'slug' => 'art',
            'text' => 'Текст о искусстве',
        ],
    ];

    public function getAllNews() : array
    {
        return $this->news;
    }

    public function getCategoryNews($id) : array
    {
        $news = [];
        foreach ($this->getAllNews() as $item) {
            if ($item['catId'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getOneItemById(int $id) : array
    {
        if(array_key_exists($id, $this->getAllNews())) {
             return $this->getAllNews()[$id];
        } else {
            return [];
        }

    }
}
