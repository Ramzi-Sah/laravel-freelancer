@extends('layouts.main')

@section('title', 'Request')

@section('navigation')
    <a href='{{Route('jobs')}}'>jobs</a>
    <a href='{{Route('jobs.show', $jobRequest->job->id)}}'>job {{ $jobRequest->job->id }}</a>
@stop

@section('content')
    <div class='main'>
        <h3>Request</h3>
        Job: {{ $jobRequest->job->name }}<br />
        cost: {{ $jobRequest->job->cost }}$<br />
        Provider: {{ $jobRequest->job->user->name }}<br />
        Requested by: {{ $jobRequest->user->name }}
        <br /><br />
        
        @if ($jobRequest->user->is(auth()->user()))
            <form style='display:inline;' method='POST' action=' {{ Route('request.delete', $jobRequest) }}'>
                @csrf
                @method('delete')
                <input type="submit" value="Cancel Request"/>
            </form> 
        @endif
        <br /><br />
        <h4>Chat:</h4>
        @if ($jobRequest->user->is(auth()->user()) || $jobRequest->job->user()->is(auth()->user()))
            <form method="POST" action="{{ Route('requestMessage.store', $jobRequest) }}">
                @csrf
                <textarea id="message" name="message">hello !</textarea><br>
                <input type="submit" value="Submit">
            </form>
            <br />
        @endif
        <ul>
            @if ($jobRequest->messages->isEmpty())
                no chat yet.
            @else
                @foreach ($jobRequest->messages as $requestMessage)
                    <li>
                        @if ($requestMessage->user()->is(auth()->user()))
                            <a style='text-decoration:none;color:black;' href="{{ route('requestMessage.edit', $requestMessage) }}">{{ $requestMessage->user->name }}: {{ $requestMessage->message }}.</a>
                        @else
                            {{ $requestMessage->user->name }}: {{ $requestMessage->message }}.
                        @endif
                    </li>
                    
                    @unless ($loop->last)
                        <br />
                    @endunless
                @endforeach
            @endif
        </ul>
    </div>
@stop