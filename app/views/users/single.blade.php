@extends('master')

@section('header')
    <a href="{{url('/')}}">Back to overview</a>
    <h2>
        {{{$user->name}}}
    </h2>
    <a href="{{url('users/'.$user->id.'/edit')}}">
        <span class="glyphicon glyphicon-edit"></span> Edit
    </a>
    <a href="{{url('users/'.$user->id.'/delete')}}">
        <span class="glyphicon glyphicon-trash"></span> Delete
    </a>
    Last edited: {{$user->updated_at}}
@stop
@section('content')
    <p>Surname: {{$user->surname}} </p>
    <p>
        @if($user->group)
            Group:
            {{link_to('users/groups/' . $user->group->name,
            $user->group->name)}}
        @endif
    </p>
@stop
