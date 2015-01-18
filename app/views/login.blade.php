@extends('master')
@section('header')<h2>Please Log In</h2>@stop
@section('content')
    {{Form::open()}}
    <div class="form-group">
        {{Form::label('Email')}} {{Form::text('email')}}
    </div>
    <div class="form-group">
        {{Form::label('Password')}} {{Form::password('password')}}
    </div>
    {{Form::submit()}}
    {{Form::close()}}
@stop