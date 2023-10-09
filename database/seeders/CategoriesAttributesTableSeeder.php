<?php

namespace Database\Seeders;

use App\Models\CategoriesAttributes;
use Illuminate\Database\Seeder;

class CategoriesAttributesTableSeeder extends Seeder
{
    public function run()
    {
        CategoriesAttributes::create(array('category_id' => 1, 'belt_id' => 5));
        CategoriesAttributes::create(array('category_id' => 2, 'belt_id' => 5));
        CategoriesAttributes::create(array('category_id' => 3, 'belt_id' => 1));
        CategoriesAttributes::create(array('category_id' => 3, 'belt_id' => 2));
        CategoriesAttributes::create(array('category_id' => 3, 'belt_id' => 3));
        CategoriesAttributes::create(array('category_id' => 4, 'belt_id' => 1));
        CategoriesAttributes::create(array('category_id' => 4, 'belt_id' => 2));
        CategoriesAttributes::create(array('category_id' => 4, 'belt_id' => 3));
        CategoriesAttributes::create(array('category_id' => 4, 'belt_id' => 4));
        CategoriesAttributes::create(array('category_id' => 5, 'belt_id' => 1));
        CategoriesAttributes::create(array('category_id' => 5, 'belt_id' => 2));
        CategoriesAttributes::create(array('category_id' => 5, 'belt_id' => 3));
        CategoriesAttributes::create(array('category_id' => 5, 'belt_id' => 4));
    }
}
