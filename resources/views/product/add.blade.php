@extends('layouts.layout')

@section('content')

    <a href="addjunction" class="btn btn-primary btn-outline w-96 my-4">Add Junctions</a>

    <form action="{{ route('product.store') }}" method="POST" class="flex flex-col gap-8 w-96">
        @csrf

        <label class="floating-label">
            <input type="text" placeholder="Name" class="input input-md w-full" name="name" />
            <span>Name</span>
        </label>

        <label class="floating-label">
            <input type="text" placeholder="Description" class="input input-md w-full" name="description" />
            <span>Description</span>
        </label>

        <label class="floating-label">
            <input type="text" placeholder="Price" class="input input-md w-full" name="price" />
            <span>Price</span>
        </label>

        <label class="floating-label">
            <input type="text" placeholder="Image URL" class="input input-md w-full" name="image" />
            <span>Image</span>
        </label>

        <input type="submit" value="Add" class="btn btn-outline btn-accent">
    </form>


@endsection