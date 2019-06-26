@extends('layouts.app')

@section('content')
    <h1>Edit a story</h1>
    {{ Form::open(['action' => ['StoryController@update', $story->id], 'method' => 'POST']) }}
    <div class="from-group">
        {{Form::label('title','Title')}}
        {{Form::text('title', $story->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="from-group">
        {{Form::label('story','Story')}}
        {{Form::textarea('story', $story->story, ['class' => 'form-control', 'placeholder' => 'Story text'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
@endsection