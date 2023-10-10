<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesAttributes extends Model
{
    use HasFactory;

    protected $table = 'category_attribute';
    public $timestamps = false;

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'id');
    }

    public function belt()
    {
        return $this->hasOne(Belt::class, 'id', 'belt_id');
    }
}
