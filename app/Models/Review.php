<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
     use HasFactory;

    protected $fillable = ['name','content','rating','is_approved'];

    protected $casts = ['is_approved' => 'boolean',];
}
