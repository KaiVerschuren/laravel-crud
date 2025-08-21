@extends('layouts.layout')

@section('content')
<form method="POST" action="{{ url('/login') }}">
    @csrf

    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>
</form>
@endsection