<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    public function product_data(){
        return $this->hasOne(Product::class, 'id', 'product');
    }

    public function price_data(){
        return $this->hasOne(Price::class, 'id', 'price');
    }

    public function order(){
        return $this->hasOne(Order::class, 'id', 'order');
    }

    public function extras(){
        return $this->hasManyThrough(
            Extra::class,
            OrderExtra::class,
            'order',
            'id',
            'id',
            'extra'
        );
    }

    public function order_data(){
        return $this->hasOne(Order::class, 'id', 'order');
    }
}
