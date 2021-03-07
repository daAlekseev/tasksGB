<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Support\Facades\File;

class News
{
    public function getAllNews() : array
    {
        $file = File::get(storage_path() . '/news.json');
        $news = json_decode($file, true);
        return $news;
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
