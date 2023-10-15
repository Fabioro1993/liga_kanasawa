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
        Belt::create(array('id' => 6, 'name' => 'Blanco/Naranja'));
        Belt::create(array('id' => 7, 'name' => 'Verde/Negro'));
        Belt::create(array('id' => 8, 'name' => '4 Integrantes (3T 1S)'));
        Belt::create(array('id' => 9, 'name' => 'Libre'));
        Belt::create(array('id' => 10, 'name' => '-36Kg +36kg'));
        Belt::create(array('id' => 11, 'name' => '-40Kg +40kg'));
        Belt::create(array('id' => 12, 'name' => '-45Kg +45kg'));
        Belt::create(array('id' => 13, 'name' => '-50Kg +50kg'));
        Belt::create(array('id' => 14, 'name' => '-55Kg +55kg'));
        Belt::create(array('id' => 15, 'name' => '-58Kg +58kg'));
        Belt::create(array('id' => 16, 'name' => '-63Kg +63kg'));
        Belt::create(array('id' => 17, 'name' => '-70Kg +70kg'));
        Belt::create(array('id' => 18, 'name' => '-1.18mts'));
        Belt::create(array('id' => 19, 'name' => '+1.18mts'));
        Belt::create(array('id' => 20, 'name' => '-1.23mts'));
        Belt::create(array('id' => 21, 'name' => '+1.23mts'));
        Belt::create(array('id' => 22, 'name' => '-1.28mts'));
        Belt::create(array('id' => 23, 'name' => '+1.28mts'));
        Belt::create(array('id' => 24, 'name' => '-1.33mts'));
        Belt::create(array('id' => 25, 'name' => '+1.33mts'));
    }
}
