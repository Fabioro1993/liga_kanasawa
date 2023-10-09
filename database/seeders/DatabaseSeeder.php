<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BeltsTableSeeder;
use Database\Seeders\VenezuelaTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\CategoriesAttributesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VenezuelaTableSeeder::class);
        $this->call(BeltsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoriesAttributesTableSeeder::class);
    }
}
