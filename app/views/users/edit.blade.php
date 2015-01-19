@extends('master')
@section('header')
    <a href="{{('../'.$user->id.'')}}">&larr; Cancel </a>
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
    {{--Form::select('groupss[]', Group::get(array('id', 'name')), null, array('multiple'))--}}
    @unless($method == 'delete')
        <div class="form-group">
            {{Form::label('Name')}}
            {{Form::text('name')}}
        </div>
        <div class="form-group">
            {{Form::label('Surname')}}
            {{Form::text('surname')}}
        </div>
        <div class="form-group">
            {{Form::label('Specialities')}}
            {{Form::text('specialities')}}
        </div>
        <div class="form-group">
            {{Form::label('Group')}}
            {{Form::select('group_id', $group_options)}}
        </div>
        <div class="form-group">
            {{Form::label('Position')}}
            {{Form::select('position_id', $position_options)}}
        </div>
        <div class="form-group">
            <label for="password">New password (if any)</label>
            <input type="password" name="password" value="" title="New password">
        </div>
        {{Form::submit("Save", array("class"=>"btn btn-default"))}}
        @else
            {{Form::submit("Delete", array("class"=>"btn btn-default"))}}
        @endif
        {{Form::close()}}

@stop