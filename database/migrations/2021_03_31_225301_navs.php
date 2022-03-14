<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Navs extends Migration
{
    public function up()
    {
        Schema::create('navs', function(Blueprint $table){
            $table->id();
            $table->string('name', 50);
            $table->string('href', 150);
            $table->integer('parent');
            $table->integer('position');
            $table->integer('login_status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_slider');
    }
}
