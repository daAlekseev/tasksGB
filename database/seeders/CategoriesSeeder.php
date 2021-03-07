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
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData() : array
    {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for($i = 1; $i < 4; $i++) {
            $data[] = [
                'slug' => $faker->sentence(rand(3,6)),
                'title' =>  $faker->sentence(rand(3,6)),
            ];
        }
        return $data;
    }
}
