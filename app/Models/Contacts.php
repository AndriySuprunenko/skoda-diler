<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'working_hours',
        'social_medias'
    ];

    protected $casts = [
        'working_hours' => 'array',
        'social_medias' => 'array',
    ];
}
