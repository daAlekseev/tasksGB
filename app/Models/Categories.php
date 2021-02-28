<?php


namespace App\Models;


class Categories
{
    private array $categories = [
        '1' => [
            'id' => 1,
            'slug' => 'sport',
            'title' => 'Спорт',
        ],
        '2' => [
            'id' => 2,
            'slug' => 'politics',
            'title' => 'Политика',
        ],
        '3' => [
            'id' => 3,
            'slug' => 'art',
            'title' => 'Искусство',
        ],
    ];

    public function getCategories() : array
    {
        return $this->categories;
    }


    public function getCategoryIdBySlug(string $slug)
    {
        $id = null;
        foreach ($this->getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }
}
