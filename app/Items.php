<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function images()
    {
        return $this->hasMany('App\ItemImages', 'item_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\ItemTags', 'item_itemtags', 'item_id', 'tag_id');
    }

    public function filters()
    {
        return $this->belongsToMany('App\ItemFilters', 'item_itemfilters', 'item_id', 'filter_id');
    }

    protected $fillable = [
        'title',
        'description',
        'preview_photo',
        'price',
        'discount',
    ];
}
