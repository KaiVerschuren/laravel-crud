@extends('layouts.layout')

@section('content')

    <div class="hero min-h-screen">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">
                    Hello there
                    @auth 
                        {{ Auth::user()->name }}
                    @endauth
                    @guest
                    Guest
                    @endguest
                </h1>
                <p class="py-6">
                    The main goal of this project is to get an understanding of PHP frameworks.
                    The most popular framework (and used in many companies) is Laravel.
                    A framework is a set of tools that help you build a more structured, reusable and secure website.
                    Laravel, like many other frameworks, is based on the MVC pattern.
                    MVC stands for Model, View, Controller.
                </p>
                @auth
                <a href="{{ route("product.index") }}" class="btn btn-primary">Products</a>
                @endauth
                @guest
                <a href="{{ route("register") }}" class="btn btn-secondary">Register</a>
                @endguest
            </div>
        </div>
    </div>


@endsection