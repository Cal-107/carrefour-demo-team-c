@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">Category:</h1>
        
        <article class="mb-5">
            <h2 class="mb-3">{{$category->category_name}}</h2>
            <div class="img-ctn">
                <img src="{{$category->img}}" alt="{{$category->category_name}}">
            </div>
        </article>
        
        <div class="btn-container">
            <a  class="btn btn-info" href="{{ route('admin.categories.index') }}">Back to archives</a>
        </div>
    </div>

@endsection