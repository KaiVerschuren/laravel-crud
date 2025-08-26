@extends('layouts.layout')

@section('content')
<form method="POST" action="{{ url('/login') }}">
    @csrf

    <input class="input" type="text" name="name" placeholder="Name" required>
    <input class="input" type="email" name="email" placeholder="Email" required>
    <input class="input" type="password" name="password" placeholder="Password" required>

    <button class="btn btn-outline btn-secondary" type="submit">Login</button>
</form>
@endsection