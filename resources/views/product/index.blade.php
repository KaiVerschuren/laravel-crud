@extends('layouts.layout')

@section('content')

    <table class="table">
        <thead>
            <tr class="">
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>categories</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th><a href="{{ route('product.add') }}" class="btn btn-accent">Add</a></th>
            </tr>
        </thead>
        <tbody>
            @if($id)
                <tr>
                    <td colspan="9" class="text-center font-bold">Filtered by category ID: {{ $id }}</td>
                </tr>
            @endif
            @foreach($items as $item)
                @if($item->categories->map(fn($cat) => $cat->id)->contains($id) || !$id)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>
                            @if($item->image)
                                {{ $item->image }}
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            {{ $item->categories->map(fn($cat) => $cat->name . ' (' . $cat->id . ')')->join(', ') }}
                        </td>


                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        @auth
                            <td>
                                <details class="dropdown">
                                    <summary class="btn m-1">open or close</summary>
                                    <ul
                                        class="menu dropdown-content bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm flex flex-col gap-2 border border-slate-700">
                                        <li><a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary">Edit</a></li>
                                        <li><a href="{{ route('product.delete', $item->id) }}" class="btn btn-error">Delete</a></li>
                                    </ul>
                                </details>
                            </td>
                        @endauth
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

@endsection