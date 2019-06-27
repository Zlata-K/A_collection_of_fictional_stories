@extends('layouts.app')

@section('content')
    <h1>@lang('info.add_new_story')</h1>
    {{ Form::open(['action' => 'StoryController@store', 'method' => 'POST']) }}
    <div class="from-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="from-group">
        {{Form::label('story','Story')}}
        {{Form::textarea('story','',['class' => 'form-control', 'placeholder' => 'Story text'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
@endsection