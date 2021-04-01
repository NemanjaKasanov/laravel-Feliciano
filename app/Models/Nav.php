<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nav extends Model
{
    use HasFactory;

    public static function getNav(){
        return Nav::orderBy('position')->get();
    }
}
