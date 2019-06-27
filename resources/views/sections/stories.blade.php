@extends('layouts.app')

@section('content')
    <h1>@lang('info.all_stories')</h1>
    @if(count($stories) > 0)
        @foreach($stories as $story)
            <div class="well">
                <h6>Author: {{$story->user->name}}</h6>
                <h3><a href="/stories/{{$story->id}}">{{$story->title}}</a></h3>
            </div>
        @endforeach
        {{$stories->links()}}
    @else
        <h1>No stories found</h1>
    @endif
@endsection