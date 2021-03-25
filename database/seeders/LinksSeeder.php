<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $links = [
        ['rssLink' => 'https://news.yandex.ru/Japan/index.rss'],
        ['rssLink' => 'https://news.yandex.ru/Vladivostok/index.rss'],
        ['rssLink' => 'https://lenta.ru/rss'],
    ];

    public function run()
    {
        DB::table('links')->insert($this->links);
    }
}
