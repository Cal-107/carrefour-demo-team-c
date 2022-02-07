@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Crea una nuova categoria</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>
                Ci sono degli errori nella compilazione del form
            </strong>

            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
            
        @endif

        <form action="{{route('admin.categories.store')}}" method="POST" class="mt-3">
        @csrf

        <label for="category_name">Nome della Categoria</label>
        <input type="text" id="category_name" name="category_name" class="form-control d-block" value="{{old('category_name')}}">
        @error ('category_name')
        <p class="text-danger">{{$message}}</p>
        @enderror
        
        <label for="img" class="mt-4">Inserisci l'URL dell'immagine per la categoria</label>
        <input type="text" name="img" id="img" class="form-control d-block" value="{{old('img')}}">
        @error ('img')
        <p class="text-danger">{{$message}}</p>
        @enderror
        
        <input class="btn btn-primary mt-4" type="submit" value="Salva la Categoria">
        
        </form>






    </div>
@endsection
