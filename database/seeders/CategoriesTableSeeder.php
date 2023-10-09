<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create(array('id' => 1, 'name' => 'Parakarate', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 2, 'name' => 'Hasta 5 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 3, 'name' => '6-7 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 4, 'name' => '8-9 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 5, 'name' => '10-11 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
    }
}
