@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>@lang('info.my_stories')</h3>
                @if(Auth::user()->type == 'admin')
                    <h6>Hey admin<h6>
                @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/stories/create" class="btn btn-primary">@lang('info.add_story')</a>
                   <!-- <h3>My stories</h3>-->
                   @if(count($stories) > 0)
                   <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($stories as $story)
                            <tr>
                            <th>{{$story->title}}</th>
                            <th><a href="/stories/{{$story->id}}" class="btn btn-warning float-left">@lang('info.read')</a></th>
                            <th><a href="/stories/{{$story->id}}/edit" class="btn btn-info float-right">@lang('info.edit')</a></th>
                            <th>
                            {!!Form::open(['action' => ['StoryController@destroy', $story->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}</th>
                        </tr>
                        @endforeach
                   </table>
                   @else
                    <h4>You do not have any stories</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
