<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //product archive
    public function index() {
        // senza impaginazione
        $products = Product::all();

        $categories = Category::all();

        // $products = Product::orderBy('id', 'desc')->paginate(3);
        // dump($products);

        return response()->json([$products, $categories]);
    }
}
