<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function addNews($siteName)
    {
        $xml = XmlParser::load($siteName);

        $news = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]']
        ]);

        foreach ($news['news'] as $item) {

            if (!$item['category']) {
                $categoryName = $news['title'];
            } else {
                $categoryName = $item['category'];
            }

            $category = Category::firstOrCreate(
                ['title' => $categoryName],
                ['slug' => Str::slug($categoryName)]
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
    }
}
