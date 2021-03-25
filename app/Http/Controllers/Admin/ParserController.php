<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Link;

class ParserController extends Controller
{
    public function index()
    {
        $links = Link::all();
        foreach ($links as $link) {
            NewsParsing::dispatch($link->rssLink);
        }
        return redirect()->route('news.index')->with('successMessage', 'Новости успешно обновлены!');
    }
}
