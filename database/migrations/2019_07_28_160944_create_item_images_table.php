<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemImagesTable extends Migration
{
    public function up()
    {
        Schema::create('item_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->string('photo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_images');
    }
}
