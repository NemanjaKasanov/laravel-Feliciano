<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderDish extends Model
{
    use HasFactory;

    public static function getSliderDishes(){
        return SliderDish::orderBy('order')->get();
    }
}
