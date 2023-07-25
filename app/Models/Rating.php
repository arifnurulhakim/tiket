<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = [
        'rating',
        'wahana_id',
    ];


    // Any additional model-specific logic or relationships can be defined here
}
