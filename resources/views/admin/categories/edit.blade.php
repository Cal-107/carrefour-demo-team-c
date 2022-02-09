@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit {{$category->category_name}}</h1>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')

            {{--name_category--}}
            <div class="mb-3">
                <label  class="form-label"
                    for="category_name">category name</label>
                <input class="form-control"
                    type="text" name="category_name" id="category_name" value="{{old('category_name', $category->category_name)}}">
                    {{--Error--}}
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>

            {{--img--}}
            <div class="mb-3">
                <label  class="form-label"
                    for="img">Immagine</label>
                <input class="form-control"
                    type="text" name="img" id="img" value="{{old('img', $category->img)}}">
                    {{--Error--}}
                    @error('img')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                Upadate Category
            </button>
        </form>
    </div>
@endsection
