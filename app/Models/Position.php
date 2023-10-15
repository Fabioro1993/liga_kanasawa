<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Competition::class, 'id', 'competition_id');
    }
}
