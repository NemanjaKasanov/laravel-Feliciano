<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Links extends Migration
{
    public function up()
    {
        Schema::create('links', function(Blueprint $table){
            $table->id();
            $table->string('name', 100);
            $table->string('href', 200);
            $table->string('image', 100);
            $table->integer('social');
        });
    }

    public function down()
    {
        Schema::dropIfExists('links');
    }
}
