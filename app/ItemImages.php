<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemImages extends Model
{
    public function item() 
    {
        return $this->belongsTo('App\Items', 'id', 'item_id');
    }

    public $fillable = [
        'photo',
    ];
}
