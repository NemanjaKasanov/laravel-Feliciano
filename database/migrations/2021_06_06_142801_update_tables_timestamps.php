<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesTimestamps extends Migration
{
    public function up()
    {
        Schema::table('home_sliders', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('comments', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('likes', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('links', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('master_chefs', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('navs', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('orders', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('slider_dishes', function(Blueprint $table){
            $table->timestamps();
        });
        Schema::table('testimonies', function(Blueprint $table){
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
