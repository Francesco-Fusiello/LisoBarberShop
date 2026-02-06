<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleReviewStat extends Model
{
     protected $fillable = [
        'total_reviews',
        'average_rating',
    ];
}
