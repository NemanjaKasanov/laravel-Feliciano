<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Likes extends Migration
{
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->integer('product');
            $table->integer('user');
            $table->timestamp('time')->useCurrent = true;
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
