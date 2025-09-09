@extends('layouts.layout')

@section('content')


<a href="addjunctionimage" class="btn btn-primary btn-outline w-96 my-4">Add Junctions</a>
<form method="POST" action="{{ route('product.storeImage') }}" class="flex flex-col gap-8 w-96" enctype="multipart/form-data">
    @csrf

    <input type="text" placeholder="Alt text" class="input w-full" name="altText" />

    <input type="file" name="file" class="file-input w-full" />

    <input type="submit" value="Add image" class="btn btn-accent btn-outline w-full" />

</form>

@endsection
