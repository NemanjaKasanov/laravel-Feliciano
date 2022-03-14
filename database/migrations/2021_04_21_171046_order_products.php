<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderProducts extends Migration
{
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->integer('product');
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
