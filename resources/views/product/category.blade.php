@extends('layouts.layout')

@section('content')
    <table class="table">
        <thead>
            <tr class="">
                <th>ID</th>
                <th>Name</th>
                <th>Products</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <a href="/product/{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    </td>
                    <td>
                        {{ $category->products->map(fn($prod) => $prod->name)->join(', ') }}
                    </td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection