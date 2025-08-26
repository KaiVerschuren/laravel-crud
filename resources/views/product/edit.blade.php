@extends('layouts.layout')

@section('content')

        <a href="/product" class="btn btn-error w-12 text-xl mb-4">
        <
        </a>
            <form action="{{ route('product.update', $product->id) }}" method="POST" class="flex gap-8 ">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-4 w-96">
                    <input class="input w-full" type="text" name="name" value="{{ $product->name }}">
                    <input class="input w-full" type="text" name="description" value="{{ $product->description }}">
                    <input class="input w-full" type="text" name="price" value="{{ $product->price }}">
                    <input class="input w-full" type="text" name="image" value="{{ $product->image ?? 'No image' }}">
                    <select name="categories[]" class="select w-full">
                        <option selected disabled>Color scheme</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button class="btn btn-outline btn-accent" type="submit">Update</button>
                </div>
                <div>

                    @if($product->image)
                        <img src="{{ $product->image }}" alt="Product image" class="w-32 h-32 object-cover">
                    @else
                        <p>No image</p>
                    @endif

                </div>
            </form>

@endsection