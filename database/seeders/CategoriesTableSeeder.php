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
        Category::create(array('id' => 6, 'name' => '12-13 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 7, 'name' => '14-15 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 8, 'name' => '16-17 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 9, 'name' => '18-34 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 10, 'name' => '+35 años', 'type' => Category::DEV, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 11, 'name' => 'Año 2017-2016', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 12, 'name' => 'Año 2015-2014', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 13, 'name' => 'Año 2013-2012', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 14, 'name' => 'Año 2011-2010', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 15, 'name' => 'Año 2009-2008', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 16, 'name' => 'Año 2007-2006', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 17, 'name' => 'Año 2005-1998', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 18, 'name' => 'Año 2007 en adelante', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 19, 'name' => 'Año 2005-1993', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 20, 'name' => 'Año 2017', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 21, 'name' => 'Año 2016', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 22, 'name' => 'Año 2015', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 23, 'name' => 'Año 2014', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
        Category::create(array('id' => 24, 'name' => 'Año 2017 en adelante', 'type' => Category::FORMATION, 'gender' => Category::GENRE_MIX));
    }
}
