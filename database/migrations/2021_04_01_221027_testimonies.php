<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Testimonies extends Migration
{
    public function up()
    {
        Schema::create('testimonies', function(Blueprint $table){
            $table->id();
            $table->string('name', 100);
            $table->string('content', 300);
            $table->string('role', 100);
            $table->string('image', 100);
            $table->integer('order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonies');
    }
}
