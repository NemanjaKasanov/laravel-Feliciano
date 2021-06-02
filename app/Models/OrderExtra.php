<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExtra extends Model
{
    use HasFactory;

    public function extras(){
        return $this->hasMany(Extra::class, 'id', 'extra');
    }
}
