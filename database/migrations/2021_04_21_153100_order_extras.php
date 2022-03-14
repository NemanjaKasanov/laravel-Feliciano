<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderExtras extends Migration
{
    public function up()
    {
        Schema::create('order_extras', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->integer('extra');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_extras');
    }
}
