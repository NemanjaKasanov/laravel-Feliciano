<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsExtras extends Migration
{
    public function up()
    {
        Schema::create('products_extras', function (Blueprint $table) {
            $table->id();
            $table->integer('product');
            $table->integer('extra');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products_extras');
    }
}
