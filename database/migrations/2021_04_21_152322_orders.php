<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user');
            $table->integer('active')->default(1);
            $table->timestamp('time')->useCurrent = true;
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
