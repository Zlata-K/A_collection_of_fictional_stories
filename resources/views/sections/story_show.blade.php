@extends('layouts.app')

@section('content')
    <h1>{{$story->title}}</h1>
    <div>
        {{$story->story}}
    </div>
    <hr>
    <h5>Author: {{$story->user->name}}</h5>
    <a href="/stories" class="btn btn-secondary">Back</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $story->user_id)
            <a href="/stories/{{$story->id}}/edit" class="btn btn-info">Edit</a>

            {!!Form::open(['action' => ['StoryController@destroy', $story->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection