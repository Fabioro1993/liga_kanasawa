<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;

    protected $table = 'competitors';

    public function state()
    {
        return $this->belongsTo('states', 'state_id', 'id');
    }
}
