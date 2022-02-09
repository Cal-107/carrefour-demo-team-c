
@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">Categories Archives</h1>

        @if (session('deleted')) 
        <div class="alert alert-success"><strong>{{session('deleted')}}</strong> è stato cancellato correttamente!</div>
        @endif

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
                            <td>
                                <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="DELETE" >
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection


