<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function getCategories(){
        return Category::all();
    }

    public function products(){
        return $this->hasMany(Product::class, 'category', 'id');
    }
}
