<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() : array
    {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for($i = 1; $i <= 10; $i++) {
            $data[] = [
                'title' => $faker->realText(10),
                'text' => $faker->realText(10),
            ];
        }
        return $data;
    }
}
