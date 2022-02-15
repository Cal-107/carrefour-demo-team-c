@extends('layouts.app')

@section('content')
    <section class="container mt-5 d-flex justify-content-center">
        <div class="card w-50 d-flex">
            <img class="w-50 align-self-center" src="{{  $product->image }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
              <h1 class="card-title">{{ $product->name }}</h1>
              <h3>Brand: {{ $product->brand }} </h3>
              <p class="card-text"><strong>Description: </strong> {{ $product->description }} </p>
              <div><strong>Weight: </strong> {{ $product->weight }} kg</div>
              <div><strong>Price per kg: </strong> {{ $product->price_per_kg }} €</div>
              <div><strong>Price: </strong> {{ $product->price }} €</div>
              <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Go back</a>
            </div>
          </div>
    </section>
@endsection