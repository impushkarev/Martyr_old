<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemFiltersTable extends Migration
{
    public function up()
    {
        Schema::create('item_filters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filter');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_filters');
    }
}
