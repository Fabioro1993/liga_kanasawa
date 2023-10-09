<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    use HasFactory;

    protected $table = 'parishes';
    public $timestamps = false;

    public function municipalities()
    {
        return $this->belongsTo('municipalities', 'municipality_id', 'id');
    }
}
