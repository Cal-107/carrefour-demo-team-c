<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'category_name',
        'slug',
        'img'
    ];
    public function products() {
        return $this->hasMany('App\Product');
    }
}
