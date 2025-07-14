<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCars extends Model
{
    protected $fillable = [
        'name',
        'status',
        'condition',
        'mileage',
        'vin',
        'gallery',
        'color',
        'engine_power',
        'transmission',
        'engine_volume',
        'fuel_consumption',
        'configuration',
        'price',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];
}
