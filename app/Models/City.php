<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    public $timestamps = false;

    public function state()
    {
        return $this->belongsTo('states', 'state_id', 'id');
    }
}
