@extends('template')
@section('content')
    <div class="container form-login">
        <form id="user-form" action="{{ route('auth.post') }}" method="POST">
            <h1>Login</h1>
            @include('users.includes.alerts')
            @csrf
            <input type="email" name="email" placeholder="E-mail" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
@endsection
