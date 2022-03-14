<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsIngredients extends Migration
{
    public function up()
    {
        Schema::create('products_ingredients', function (Blueprint $table) {
            $table->id();
            $table->integer('product');
            $table->integer('ingredient');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products_ingredients');
    }
}
