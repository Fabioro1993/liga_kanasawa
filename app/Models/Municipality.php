<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipalities';
    public $timestamps = false;

    public function state()
    {
        return $this->belongsTo('states', 'state_id', 'id');
    }

    public function parishes()
    {
        return $this->hasMany('parishes', 'municipality_id', 'id');
    }
}
