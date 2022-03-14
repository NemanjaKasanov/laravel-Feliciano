<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterChefs extends Migration
{
    public function up()
    {
        Schema::create('master_chefs', function(Blueprint $table){
            $table->id();
            $table->string('name', 100);
            $table->string('title', 100);
            $table->string('image', 100);
            $table->integer('order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_chefs');
    }
}
