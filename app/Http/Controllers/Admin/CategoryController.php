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
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
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
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        
        if(! $category){
            abort(404);
        }

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if (! $category){
            abort (404);
        }

        return view('admin.categories.edit', compact('category'));
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
        //validazione dei dati
        $request->validate($this->validation_rules(), $this->validation_message());

        $data = $request->all();

        //aggiorniamo lo slug univoco
        $category = Category::find($id);
        if ($data['category_name'] != $category->category_name) {

            $slug = Str::slug($data['category_name'], '-');
            $count = 1;
            $slug_base = $slug;

            while(Category::where('slug', $slug)->first()) {
                $slug = $slug_base . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        } else {
            $data['slug'] = $category->slug;
        };

        //aggiorniamo il postmark
        $category->update($data);

        //reindirizziamo
        return redirect()->route('admin.categories.show', $category->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();
 
        return redirect()->route('admin.categories.index')->with('deleted', $category->category_name);
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
