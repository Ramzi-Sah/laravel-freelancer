@extends('layouts.main')

@section('title', 'edit a message')

@section('navigation')
    <a href='{{Route('jobs')}}'>jobs</a>
    <a href='{{Route('request.show', $requestMessage->jobRequest->id)}}'>request {{ $requestMessage->jobRequest->id }}</a>
@stop

@section('content')
    <div class='main'>
        <h3>Message</h3>
        <form method="POST" style='display:inline;' action="{{ Route('requestMessage.update', $requestMessage) }}">
            @csrf
            @method('patch')
            <textarea id="message" name="message">{{ $requestMessage->message }}</textarea><br>
            <input type="submit" value="Edit">
        </form>
        <form style='display:inline;' method='POST' action=' {{ Route('requestMessage.delete', $requestMessage) }}'>
            @csrf
            @method('delete')
            <input type="submit" value="Delete"/>
        </form> 

        <br />
    </div>
@stop