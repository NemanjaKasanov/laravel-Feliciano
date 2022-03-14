<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SliderDishes extends Migration
{
    public function up()
    {
        Schema::create('slider_dishes', function(Blueprint $table){
            $table->id();
            $table->string('title', 100);
            $table->string('description', 100);
            $table->string('image', 100);
            $table->integer('order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('slider_dishes');
    }
}
