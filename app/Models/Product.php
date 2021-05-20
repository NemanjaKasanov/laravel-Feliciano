<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function getBreakfastDishes(){
        return Product::where('category', 1)
                        ->with('category_name', 'ingredients')
                        ->get();
    }

    public function category_name(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function ingredients(){
        return $this->hasManyThrough(
            Ingredient::class,
            ProductsIngredient::class,
            'product',
            'id',
            'id',
            'ingredient'
        );
    }

    public function prices(){
        return $this->hasMany(Price::class, 'product', 'id');
    }

    public function extras(){
        return $this->hasManyThrough(
            Extra::class,
            ProductsExtra::class,
            'product',
            'id',
            'id',
            'extra'
        );
    }
}
