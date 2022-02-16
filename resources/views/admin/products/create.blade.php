@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea un nuovo prodotto</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.products.store')}}" method="POST">
            @csrf
            
            <label for="name">Nome prodotto</label>
            <input type="text" id="name" name="name" class="form-control mb-3">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="brand">Marca prodotto</label>
            <input type="text" id="brand" name="brand" class="form-control mb-3">
            @error('brand')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="image">Url immagine</label>
            <input type="text" id="image" name="image" class="form-control mb-3">
            

            <label for="description">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-3"></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="price_per_kg">Prezzo al chilo</label>
            <input type="text" id="price_per_kg" name="price_per_kg" class="form-control mb-3">
            @error('price_per_kg')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="weight">Peso</label>
            <input type="text" id="weight" name="weight" class="form-control mb-3">
            @error('weight')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="category_id">Category</label>
            <select class="form-control mb-3" name="category_id" id="category_id">

                <option value="">No category</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if ($category->id == old('category_id')) selected @endif
                        >
                        {{$category->category_name}}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Crea</button>
            
        </form>
    </div>
@endsection