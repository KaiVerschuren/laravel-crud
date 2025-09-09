@extends('layouts.layout')

@section('content')

<div>
    <a class="btn btn-primary" href="addImage">add images</a>
</div>
<div class="grid grid-cols-3 w-fit gap-2">
    @foreach ($images as $image)
        <div class="w-48">
            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt_text }}">

        </div>
    @endforeach
</div>

@endsection
