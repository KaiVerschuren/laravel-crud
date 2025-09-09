<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Laravel - CRUD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>



<body>
    <header>
        <div></div>
        <nav>
            <ul class="list-none flex gap-4">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/product') }}">Products</a></li>
                <li><a href="{{ url('/product/category') }}">Categories</a></li>
                <li><a href="{{ url('/product/image') }}">images</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
                @auth
                    <li>
                        <button onclick="window.location.href='/logout'" class="btn">Logout</button>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>

    @if(session('success'))
        <div id="alert-success" class="bg-green-200 text-green-800 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer></footer>
</body>

</html>
