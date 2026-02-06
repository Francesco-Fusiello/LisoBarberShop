<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleReview extends Model
{
     protected $fillable = [
        'review_id',
        'author_name',
        'rating',
        'text',
        'profile_photo',
        'relative_time',
        'from_google',
    ];
}
