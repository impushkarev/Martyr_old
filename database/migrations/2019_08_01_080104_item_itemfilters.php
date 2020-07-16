<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemItemfilters extends Migration
{
    public function up()
    {
        Schema::create('item_itemfilters', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->unsignedBigInteger('filter_id');
            $table->foreign('filter_id')->references('id')->on('item_filters');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_itemfilters');
    }
}
