<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $fillable = [
        'name',
        'power',
        'gear_box',
        'engine_capacity',
        'fuel_consumtion',
        'complectation',
        'image',
    ];
}
