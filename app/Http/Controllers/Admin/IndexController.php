<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;


class IndexController extends Controller
{
    public function downloadNewsJSON()
    {
        return response()->json(News::all())
            ->header('Content-Disposition', 'attachment; filename = "allNewsJSON.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function downloadCategoryJSON()
    {
        return response()->json(Category::all())
            ->header('Content-Disposition', 'attachment; filename = "allCategoriesJSON.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
