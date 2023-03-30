@extends('backend.layouts.app')

@section('content')
    <form action="" method="POST">
        <label for="email">email</label>
        <input type="text" name="email">
        <label for="username">email</label>
        <input type="text" name="username">
        <label for="password">email</label>
        <input type="password" name="password">
        <input type="password" name="password_confirmation">
        <button type="submit">Register</button>
    </form>
@endsection
