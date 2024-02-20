<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Kyslik\ColumnSortable\Sortable;


class Store extends Model
{
    use HasFactory, Favoriteable, Sortable;
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
     
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function resarvations()
    {
        return $this->hasMany(Resarvation::class);
    }

    const DAY_OF_WEEK = ['日','月','火','水','木','金','土'];

    public function setHolidayAttribute($holidays)
    {
        $results = [];
        foreach($holidays as $holiday){
            $results[] = Store::DAY_OF_WEEK[$holiday];
        }            
        $this->attributes['holiday'] = implode(",",$results);
    }
}
