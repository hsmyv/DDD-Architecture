@extends('backend.layouts.app')

@section('content')
    <form action="{{route('user.register')}}" method="POST">
        <label for="email">email</label>
        <input type="text" name="email">
        <label for="username">username</label>
        <input type="text" name="username">
        <label for="password">password</label>
        <input type="password" name="password">
        <input type="password" name="password_confirmation">
        <button type="submit">Register</button>
    </form>
@endsection
