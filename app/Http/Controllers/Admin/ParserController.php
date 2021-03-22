<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function index()
    {
        $xml = XmlParser::load('https://lenta.ru/rss');

        $news = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]']
        ]);

        foreach ($news['news'] as $item) {
            $category = Category::firstOrCreate(
                ['title' => $item['category']],
                ['slug' => Str::slug($item['category'])]
            );

            News::firstOrCreate(
                ['link' => $item['link']],
                [
                    'title' => $item['title'],
                    'text' => $item['description'],
                    'pubDate' => date('Y-m-d H:i:s' , strtotime($item['pubDate'])),
                    'image' => $item['enclosure::url'],
                    'category_id' => $category->id
                ]
            );
        }

        return redirect()->route('news.index')->with('successMessage', 'Новости успешно обновлены!');
    }
}
