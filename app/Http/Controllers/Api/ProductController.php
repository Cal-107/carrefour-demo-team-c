<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //product archive
    public function index() {
        // senza impaginazione
        $products = Product::all();

        // $products = Product::orderBy('id', 'desc')->paginate(3);
        // dump($products);

        return response()->json($products);
    }
    public function show($slug) {
        // Take post by Slug
        $product = Product::where('slug', $slug)->with(['category'])->first();

        // if (! $product) {
        //     $product['not_found'] = true;
        // }

        return response()->json($product);
    }
}
