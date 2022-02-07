
@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">Categories Archives</h1>

        @if($categories->isEmpty())
            <p>No categories found yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th colspan="4">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.categories.show', $category->id) }}">SHOW</a>
                            </td>
                            <td>CREATE</td>
                            <td>DELETE</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection


