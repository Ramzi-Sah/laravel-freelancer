@extends('layouts.main')

@section('title', 'Job')

@section('navigation')
    <a href='{{ Route('jobs') }}'>jobs</a>
@stop

@section('content')
    <div class='main'>
        <h3>Job</h3>
        name: {{ $job->name }}<br />
        cost: {{ $job->cost }}$<br />
        provider: {{ $job->user->name }}
        <br /><br />
        @auth
            @if ($job->user->is(auth()->user()))
                <form style='display:inline;' method='GET' action=' {{ Route('jobs.edit', $job) }}'>
                    <input type="submit" value="Edit"/>
                </form>
                <form style='display:inline;' method='POST' action=' {{ Route('jobs.delete', $job) }}'>
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete"/>
                </form>
            @else
                <form style='display:inline;' method="POST" action="{{Route('request.store', $job)}}">
                    @csrf
                    <input type="submit" value="make request"
                        @if (in_array(auth()->user()->id, array_column($requests->toArray(), 'user_id')))
                            disabled
                        @endif
                    />
                </form>
            @endunless
        @endauth
        <br />
        <br />
        <h3>Requests:</h3>
        <ul>
            @if ($requests->isEmpty())
                no requests yet.
            @else
                @foreach ($requests as $request)
                    <li><a href="{{ route('request.show', $request) }}">from {{ $request->user->name }}</a></li>
                    
                    @unless ($loop->last)
                        <br />
                    @endunless
                @endforeach   
            @endif
        </ul>
    </div>
@stop