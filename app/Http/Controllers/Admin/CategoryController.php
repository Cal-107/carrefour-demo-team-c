<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation_rules(), $this->validation_message());

        $data = $request->all();
        
        $new_category = new Category();

        //creazione di slug univoco
        $slug = Str::slug($data['category_name'], '-');
        $count = 1;
        $slug_base = $slug;

        while(Category::where('slug', $slug)->first()) {
            $slug = $slug_base . '-' . $count;
            $count++;
        }


        //assegnamo lo slug univoco
        $data['slug'] = $slug;

        //associamo i dati
        $new_category->fill($data);

        //salviamo i dati
        $new_category->save();

        return redirect()->route('admin.categories.show', $new_category->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show ok';
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
        //
    }





    //validation category rules
    private function validation_rules() {
        return [
            'category_name' => 'required|max:255',
            'img' => 'required',
        ];
    }
    
    //validation category message
    private function validation_message() {
        return [
            'category_name.required' => 'Il nome della categoria è obbligatorio',
            'img.required' => 'Il link per l immagine è obbligatorio',
        ];
    }

}
