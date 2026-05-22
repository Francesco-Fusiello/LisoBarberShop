<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourItem extends Model
{
     protected $fillable = [
        'image',
        'city',
        'country',
        'year',
        'sort_order'
    ];
}
