<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(Account::class, 'id', 'user');
    }

    public function products(){
        return $this->hasMany(OrderProduct::class, 'order', 'id');
    }
}
