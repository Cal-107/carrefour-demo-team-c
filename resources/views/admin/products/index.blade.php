@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Our Products</h1>
        @if ($products->isEmpty())
            <p>No products yet, <a href="{{ route('admin.products.create')}}">add one from here</a></p>    
        @endif

        @if (session('deleted'))
        <div class="alert alert-success">
            <strong> {{ session('deleted') }} </strong> has been successfully deleted 
        </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $product->id }}</td>
                        <td class="text-center">{{ $product->name }}</td>
                        {{-- <td>
                            @if ($product->category)
                                <a href="{{ route('admin.category', $product->category->id) }}"> 
                                    {{ $product->category->name }}
                                </a>
                            @else
                                Uncategorized
                            @endif
                        </td> --}}
                        <td class="text-center">
                            <a href="{{ route('admin.products.show', $product->slug) }}" class="btn btn-info">Show product</a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-secondary">Edit product</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    Delete product
                                </button>
                            </form>
                        </td>                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    </section>
@endsection