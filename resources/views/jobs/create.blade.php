@extends('layouts.main')

@section('title', 'jobs')

@section('navigation')
    <a href='{{ Route('jobs') }}'>jobs</a>
@stop

@section('content')
    <div class='main'>
        <h3>Post Job:</h3>
        <form method="POST" action="{{ Route('jobs.store') }}">
            @csrf
            <label for="name">name:</label><br>
            <input type="text" id="name" name="name" value="do something for you"><br>
            <label for="cost">cost:</label><br>
            <input type="number" id="cost" name="cost" value="10"><br><br>
            <input type="submit" value="Submit">
        </form> 
    </div>
@stop