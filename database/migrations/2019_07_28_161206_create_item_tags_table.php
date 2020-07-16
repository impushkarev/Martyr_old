<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTagsTable extends Migration
{
    public function up()
    {
        Schema::create('item_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tag');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_tags');
    }
}
