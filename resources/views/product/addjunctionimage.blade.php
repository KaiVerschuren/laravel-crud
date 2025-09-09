@extends('layouts.layout')

@section('content')

<form action="{{ route('product.storejunctionimage') }}" method="POST" class="flex flex-col gap-8 w-96">
    @csrf

    <select name="image_id" class="select w-full">
        <option selected disabled>Choose image</option>
        @foreach($images as $image)
        <option value="{{ $image->id }}">
            {{ $image->alt_text }} ({{ $image->id }})
        </option>
        @endforeach
    </select>
    <select name="product_id" class="select w-full">
        <option selected disabled>Choose product</option>
        @foreach($products as $product)
        <option value="{{ $product->id }}">
            {{ $product->name }} ({{ $product->id }})
        </option>
        @endforeach
    </select>

    <input type="submit" value="Add" class="btn btn-outline btn-accent">
</form>
@endsection
