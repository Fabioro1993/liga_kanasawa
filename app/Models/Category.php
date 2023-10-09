<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const GENRE_FEM = "F";
    const GENRE_MALE = "M";
    const GENRE_MIX = "Mix";

    const DEV = "Desarrollo";
    const FORMATION = "Formación deportiva";

    protected $table = 'categories';
}
