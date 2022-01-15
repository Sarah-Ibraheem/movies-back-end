<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'video_url',
        'production_year',
        'director',
        'subtitle_language',
        'Original_language',
        'image',
        'duration',
        'evaluation',
        'long_description',
    ];

}
