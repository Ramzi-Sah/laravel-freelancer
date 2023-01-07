@extends('layouts.main')

@section('title', 'Jobs')

@section('navigation')
    <a href='/'>main</a>
@stop

@section('content')
    <div class='main'>
        @auth
            <h3>Your Jobs:</h3>
            <ul>
                @if (empty($user_jobs))
                    you don't have any job.
                @else
                    @foreach ($user_jobs as $job)
                        <li>
                            <a style='text-decoration:none;color:black;' href='{{ Route('jobs.show', $job) }}'>
                                {{ $job['name'] }} |
                                cost {{ $job['cost'] }}$ |
                                number of requests {{ $job['nbrRequests'] }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <form method='GET' action=' {{ Route('jobs.create') }}'>
                <input type="submit" value="+ post a new job"/>
            </form>
            <br />
        @endauth

        <h3>Jobs list:</h3>
        <ul>
            @if (empty($jobs))
                there's no job available.
            @else
                @foreach ($jobs as $job)
                    <li>
                        <a style='text-decoration:none;color:black;' href='{{ Route('jobs.show', $job) }}'>
                            {{ $job['name'] }} |
                            cost {{ $job['cost'] }}$ |
                            provider: {{ $job['user']['name']}} |
                            number of requests {{ $job['nbrRequests'] }}
                        </a>
                    </li> 
                @endforeach
            @endif
        </ul>
    </div>
@stop