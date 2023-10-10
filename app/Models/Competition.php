<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $table = 'competencies';

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function belt()
    {
        return $this->hasOne(Belt::class, 'id', 'belt_id');
    }
}
