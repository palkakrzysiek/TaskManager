@extends('master')

@section('header')
    <h2>
        {{{$user->name}}} {{{$user->surname}}}
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
    <p>Position: {{$user->getPositionFriendlyName()}} </p>
    <p>
        @if($user->group)
            Group:
            {{link_to('users/groups/' . $user->group->name,
            $user->group->name)}}
        @endif
    </p>
    <h3>Tasks</h3>
    @foreach($user->tasks as $task)
        <div class="tasks">
            <a href="{{url('tasks/'.$user->id)}}">
                <strong> {{{$task->description}}} </strong> - {{{$user->group->name}}}
            </a>
        </div>
    @endforeach
@stop
