@extends('layouts.app')

@section('content')
    <h1>{{$story->title}}</h1>
    <div>
        {{$story->story}}
    </div>
    <hr>
    <h5>@lang('info.author') {{$story->user->name}}</h5>
    <a href="/stories" class="btn btn-secondary">@lang('info.back')</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $story->user_id || Auth::user()->type == 'admin')
            <a href="/stories/{{$story->id}}/edit" class="btn btn-info">@lang('info.edit')</a>

            {!!Form::open(['action' => ['StoryController@destroy', $story->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif

<h4>@lang('info.comments')</h4>
    @foreach($story->comments as $comment)
        <div class="display-comment">
            <strong>{{ $comment->user->name }}</strong>
            <p>{{ $comment->text }}</p>
        </div>
    @endforeach
    @if(!Auth::guest())
    <hr />
    <h4>@lang('info.add_comment')</h4> <!--form that can add the comment--> 
    <form method="post" action="{{ route('comment.add') }}"> 
        @csrf
        <div class="form-group">
            <input type="text" name="text" class="form-control" />
            <input type="hidden" name="story_id" value="{{ $story->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="@lang('info.add_comment')" />
        </div>
    </form>
    @endif
@endsection