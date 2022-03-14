<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartExtras extends Migration
{
    public function up()
    {
        Schema::create('cart_extras', function (Blueprint $table) {
            $table->id();
            $table->integer('cart');
            $table->integer('extra');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_extras');
    }
}
