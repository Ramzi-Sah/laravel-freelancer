@extends('layouts.login')

@section('title', 'login')

@section('content')
    <div class='main'>
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email:</label><br />
                <input id="email" type="email" name="email" required autofocus/>
            </div>
            <br />
            <div>
                <label for="password">Password:</label><br />
                <input id="password" type="password" name="password" required/>
            </div>
            <br />
            <input type="submit" value="Login">
        </form>
    </div>
    <br />
    <p>You don't have an account yet ? <a href="{{ route('register') }}">Register</a></p>

@stop