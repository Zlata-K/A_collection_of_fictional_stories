@extends('layouts.app')

@section('content')
    <h1>All stories:</h1>
    @if(count($stories) > 0)
        @foreach($stories as $story)
            <div class="well">
                <h5>Author:{{$story->user->name}}</h5>
                <h3><a href="/stories/{{$story->id}}">{{$story->title}}</a></h3>
            </div>
        @endforeach
        {{$stories->links()}}
    @else
        <h1>No stories found</h1>
    @endif
@endsection