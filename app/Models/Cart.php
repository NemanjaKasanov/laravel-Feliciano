<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function productObj(){
        return $this->hasOne(Product::class, 'id', 'product');
    }

    public function priceObj(){
        return $this->hasOne(Price::class, 'id', 'price');
    }

    public function extras(){
        return $this->hasManyThrough(
            Extra::class,
            CartExtra::class,
            'cart',
            'id',
            'id',
            'extra'
        );
    }
}
