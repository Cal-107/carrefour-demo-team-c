<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'brand', 
        'description', 
        'weight', 
        'price_per_kg', 
        'price', 
        'slug',
        'image',
        'category_id'
    ];
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
