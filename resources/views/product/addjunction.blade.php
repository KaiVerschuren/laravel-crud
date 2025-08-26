@extends('layouts.layout')

@section('content')

    <a href="add" class="btn btn-primary btn-outline w-96 my-4">Add Products</a>

    <form action="{{ route('product.storejunction') }}" method="POST" class="flex flex-col gap-8 w-96">
        @csrf

        <select name="product_id" class="select w-full">
            <option selected disabled>Choose product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }} ({{ $product->id }})
                </option>
            @endforeach
        </select>

        <select name="cat_id" class="select w-full">
            <option selected disabled>Choose category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }} ({{ $category->id }})
                </option>
            @endforeach
        </select>

        <input type="submit" value="Add" class="btn btn-outline btn-accent">
    </form>


@endsection