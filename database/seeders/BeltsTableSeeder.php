<?php

namespace Database\Seeders;

use App\Models\Belt;
use Illuminate\Database\Seeder;

class BeltsTableSeeder extends Seeder
{
    public function run()
    {
        Belt::create(array('id' => 1, 'name' => 'Blanco/Celeste'));
        Belt::create(array('id' => 2, 'name' => 'Amarillo/Naranja'));
        Belt::create(array('id' => 3, 'name' => 'Verde/Azul'));
        Belt::create(array('id' => 4, 'name' => 'Marron/Negro'));
        Belt::create(array('id' => 5, 'name' => 'Todos'));
    }
}
