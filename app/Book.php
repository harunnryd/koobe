<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'page', 'price', 'desc', 'author', 'photo', 'stock'];
    protected $appends = ['photo_path'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    //

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function getCategoryAttribute()
    {
        return $this->categories()->pluck('id')->all();
    }

    public function getPhotoPathAttribute()
    {
        return '/img/'. $this->photo;
    }
}
