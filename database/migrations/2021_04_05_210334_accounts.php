<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accounts extends Migration
{
    public function up()
    {
        Schema::create('accounts', function(Blueprint $table){
            $table->id();
            $table->string('name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->string('phone', 20);
            $table->string('address', 100);
            $table->string('municipality', 50);
            $table->string('password', 500);
            $table->integer('role')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
