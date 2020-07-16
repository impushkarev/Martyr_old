<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemItemtags extends Migration
{
    public function up()
    {
        Schema::create('item_itemtags', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('item_tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_itemtags');
    }
}
