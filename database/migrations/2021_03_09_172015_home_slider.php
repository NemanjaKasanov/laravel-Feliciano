<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HomeSlider extends Migration
{
    public function up()
    {
        Schema::create('home_sliders', function(Blueprint $table){
            $table->id();
            $table->string('content', 100);
            $table->string('image', 200);
            $table->integer('order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_slider');
    }
}
