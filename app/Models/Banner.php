<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title', 'description', 'item_one', 'item_two', 'item_three', 'item_four', 'item_five', 'item_six', 'image', 'is_active', 'order', 'button_text', 'button_type'];
}
