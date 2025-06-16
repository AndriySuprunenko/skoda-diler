<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelImage extends Model
{
    protected $fillable = ['image', 'models_id'];

    public function model()
    {
        return $this->belongsTo(Models::class, 'models_id');
    }
}
