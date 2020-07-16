<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTags extends Model
{
    public function items()
    {
        return $this->belongsToMany('App\Items');
    }

    public $fillable = [
        'tag',
    ];
}
