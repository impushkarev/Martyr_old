<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'preview_photo',
        'title',
        'text',
    ];
}
