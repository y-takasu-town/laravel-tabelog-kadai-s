<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Store extends Model
{
    use HasFactory, Favoriteable;
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
     
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
