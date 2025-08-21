@extends('layouts.layout')

@section('content')
homepage

@auth
    Name: {{ Auth::user()->name }}
@endauth


@endsection