@extends('layouts.login')

@section('title', 'login')

@section('content')
    <div class='main'>
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name">Name:</label><br />
                <input id="name" type="text" name="name" required autofocus/>
            </div>
            <br />
            <div>
                <label for="email">Email:</label><br />
                <input id="email" type="email" name="email" required/>
            </div>
            <br />
            <div>
                <label for="password">Password:</label><br />
                <input id="password" type="password" name="password" required/>
            </div>
            <br />
            <div>
                <label for="password_confirmation">Confirm Password:</label><br />
                <input id="password_confirmation" type="password" name="password_confirmation" required/>
            </div>
            <br />
            <input type="submit" value="Register">
        </form>
    </div>
    <br />
    <p>You already have an account ? <a href="{{ route('login') }}">Login</a></p>
@stop