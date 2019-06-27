@extends('layouts.app')

@section('content')
<h1>@lang('info.all_authors')</h1>
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class="well">
                <h5>{{$user->name}}</h5>
            </div>
        @endforeach
    @else
        <h1>No authors found</h1>
    @endif

@endsection
   