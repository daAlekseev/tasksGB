<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index')->with('news', DB::table('news')->get());
    }

    public function getOneItem($id)
    {
        return view('news.item')->with('news', DB::table('news')->where('id', $id)->get());
    }
}
