<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterChef extends Model
{
    use HasFactory;

    public static function getChefs(){
        return MasterChef::orderBy('order')->get();
    }
}
