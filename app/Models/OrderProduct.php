<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product');
    }

    public function price(){
        return $this->hasOne(Price::class, 'id', 'price');
    }

    public function order(){
        return $this->hasOne(Order::class, 'id', 'order');
    }

    public function extras(){
        return $this->hasMany(OrderExtra::class, 'order', 'id');
    }
}
