@extends('master')
@section('header')
    <a href="{{('/users/'.$user->id.'')}}">&larr; Cancel </a>
    <h2>
        @if($method == 'post')
            Add a new user
        @elseif($method == 'delete')
            Delete {{$user->name}}?
        @else
            Edit {{$user->name}}
        @endif
    </h2>
@stop
@section('content')
    {{Form::model($user, array('method' => $method, 'url'=>
    'users/'.$user->id))}}
    @unless($method == 'delete')
        <div class="form-group">
            {{Form::label('Name')}}
            {{Form::text('name')}}
        </div>
        <div class="form-group">
            {{Form::label('Group')}}
            {{Form::select('group_id', $group_options)}}
        </div>
        {{Form::submit("Save", array("class"=>"btn btn-default"))}}
        @else
            {{Form::submit("Delete", array("class"=>"btn btn-default"))}}
        @endif
        {{Form::close()}}
@stop