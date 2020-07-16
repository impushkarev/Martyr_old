<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemFilters extends Model
{
    public function items()
    {
        return $this->belongsToMany('App\Items', 'item_itemfilters', 'filter_id', 'item_id');
    }

    public $fillable = [
        'filter',
    ];
}
