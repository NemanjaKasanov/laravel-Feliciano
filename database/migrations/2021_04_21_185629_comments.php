<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('product');
            $table->integer('user');
            $table->string('content', 300);
            $table->timestamp('time')->useCurrent = true;
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
