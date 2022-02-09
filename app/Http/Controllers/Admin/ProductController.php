<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin/products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        dump($data);

        $new_product = new Product();


        // SLUG

        $slug = Str::slug($data['name'], '-');
        $count = 1;
        $base_slug = $slug;

        while(Product::where('slug', $slug)->first()) {
            $slug = $base_slug . '-' . $count;
        }

        $data['slug'] = $slug;

        // CALCULATE PRICE

        $data['price_per_kg'] = str_replace(',', '.', $data['price_per_kg']);
        $data['weight'] = str_replace(',', '.', $data['weight']);

        // dd($data['weight']);
        
        $data['price_per_kg'] = floatval($data['price_per_kg']);
        $data['weight'] = floatval($data['weight']);

        $price = $data['price_per_kg'] * $data['weight'];

        // dd($price);

        $data['price'] = $price;
 
        

        $new_product->fill($data);

        $new_product->save();

        return redirect()->route('admin.products.index');

        



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (! $product) {
            abort(404);
        }
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        $product->delete();

        return redirect()->route('admin.products.index')->with('deleted', $product->name);
    }
}
