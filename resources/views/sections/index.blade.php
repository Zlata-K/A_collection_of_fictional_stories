@extends('layouts.app')

@section('content')
       <div class="jumbotron text-center">
               <!-- <h1>{{$title}}</h1>-->
               <h1>@lang('info.welcome')</h1>
               <!-- <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a><a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>-->
               <h4>@lang('info.main_text')</h4>
        </div>
@endsection