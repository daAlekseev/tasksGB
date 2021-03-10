<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $category = [
        [
            "title" => "Спорт",
            "slug" => "sport",
        ],
        [
            "title" => "Политика",
            "slug" => "politics",
        ],
        [
            "title" => "Искусство",
            "slug" => "art",
        ],
    ];

    public function run()
    {
        DB::table('categories')->insert($this->category);
    }
}
