@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea un nuovo prodotto</h2>

        <form action="{{route('admin.products.store')}}" method="POST">
            @csrf
            
            <label for="name">Nome prodotto</label>
            <input type="text" id="name" name="name" class="form-control mb-3">

            <label for="brand">Marca prodotto</label>
            <input type="text" id="brand" name="brand" class="form-control mb-3">

            <label for="image">Url immagine</label>
            <input type="text" id="image" name="image" class="form-control mb-3">

            <label for="description">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-3"></textarea>

            <label for="price_per_kg">Prezzo al chilo</label>
            <input type="text" id="price_per_kg" name="price_per_kg" class="form-control mb-3">

            <label for="weight">Peso</label>
            <input type="text" id="weight" name="weight" class="form-control mb-3">

            <button type="submit" class="btn btn-primary">Crea</button>
            
        </form>
    </div>
@endsection