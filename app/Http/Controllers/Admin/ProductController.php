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

        $request->validate($this->validation_rules(), $this->validation_messages());
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
        $product = Product::find($id);

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate($this->validation_rules(), $this->validation_messages());

        $data = $request->all();
       
      
        if ($data['name'] != $product->title) {
            $slug = Str::slug($data['name'], '-');
            $count = 1;
            $base_slug = $slug;

            // run th cicle if found the product with same slug
            while (Product::where('slug', $slug)->first()) {
                // gen new slug with counter
                $slug .= $base_slug . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        }
        else {
            $data['slug'] = $product->Slug;
        }

        // RECALCULATE PRICE 

        $data['price_per_kg'] = str_replace(',', '.', $data['price_per_kg']);
        $data['weight'] = str_replace(',', '.', $data['weight']);
        
        $data['price_per_kg'] = floatval($data['price_per_kg']);
        $data['weight'] = floatval($data['weight']);

        $price = $data['price_per_kg'] * $data['weight'];

        $data['price'] = $price;

        $product->update($data);

        return redirect()->route('admin.products.show', $product->slug);


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

    //VALIDATION

    private function validation_rules() {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'brand' => 'required', 
            'weight' => 'required',
            'price_per_kg' => 'required',
            'image' => 'nullable',


            // 'category_id' => 'nullable|exists:categories,id',
            // 'tags' => 'nullable|exists:tags,id'
        ];
    }
    
    private function validation_messages() {
        return [
            'required' => 'The :attribute is required',
            'max' => 'Max :max characters allowed for the :attribute',
            // 'category_id.exists' => 'Selected category does not exists',
            // 'tags.exists' => 'Seleceted tag does not exists'
        ];
    }
}

