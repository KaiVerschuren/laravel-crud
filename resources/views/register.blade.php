@extends('layouts.layout')

@section('content')
<form method="POST" action="{{ url('/register') }}">
    @csrf

    <input class="input" type="text" name="name" placeholder="Name" required>
    <input class="input" type="email" name="email" placeholder="Email" required>
    <input class="input" type="password" name="password" placeholder="Password" required>
    <input class="input" type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <button class="btn btn-outline btn-secondary" type="submit">Register</button>
</form>

@endsection