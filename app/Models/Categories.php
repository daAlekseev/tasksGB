<?php


namespace App\Models;
use Illuminate\Support\Facades\File;

class Categories
{
    public function getCategories() : array
    {
        $file = File::get(storage_path() . '/categories.json');
        $categories = json_decode($file, true);
        return $categories;
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
