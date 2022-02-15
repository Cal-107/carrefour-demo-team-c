@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit &RightArrow; {{ $product->name }}</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <label for="name">Nome prodotto</label>
            <input type="text" id="name" name="name" class="form-control mb-3" value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="brand">Marca prodotto</label>
            <input type="text" id="brand" name="brand" class="form-control mb-3" value="{{ old('brand', $product->brand) }}">
            @error('brand')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="image">Url immagine</label>
            <input type="text" id="image" name="image" class="form-control mb-3" value="{{ old('image', $product->image) }}">
            

            <label for="description">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-3"> {{ old('description', $product->description) }} </textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="price_per_kg">Prezzo al chilo</label>
            <input type="text" id="price_per_kg" name="price_per_kg" class="form-control mb-3" value=" {{ old('price_per_kg', $product->price_per_kg) }} ">
            @error('price_per_kg')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="weight">Peso</label>
            <input type="text" id="weight" name="weight" class="form-control mb-3" value="{{ old('weight', $product->weight) }}">
            @error('weight')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Salva modifiche</button>
            
        </form>
    </div>
@endsection