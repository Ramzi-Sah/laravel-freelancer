@extends('layouts.main')

@section('title', 'jobs')

@section('navigation')
    <a href='{{ Route('jobs') }}'>jobs</a>
@stop

@section('content')
    <div class='main'>
        <form style='display:inline;' method='POST' action=' {{ Route('jobs.update', $job) }}'>
            @csrf
            @method('patch')
            job id: {{ $job->id }}<br />
            <label for="name">name:</label>
            <input type="text" id="name" name="name" value="{{ $job->name }}"><br>
            <label for="cost">cost:</label>
            <input type="number" id="cost" name="cost" value="{{ $job->cost }}">$<br><br>
            <input type="submit" value="Save"/>
        </form>
        <form style='display:inline;' method='GET' action=' {{ Route('jobs.show', $job) }}'>
            <input type="submit" value="Cancel"/>
        </form>
    </div>
@stop