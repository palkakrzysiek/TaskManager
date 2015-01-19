@extends('master')

@section('header')
    @if(isset($group))
        {{link_to('/', 'Back to the overview')}}
    @endif
    <h2>
        All Employees
        @if(Auth::check() and Auth::user()->canAddProfile())
            <a href="{{url('groups/create')}}" class="btn btn-primary pull-right">
                Add new user
            </a>
        @endif
    </h2>
@stop
@section('content')
    @foreach($users as $user)

        <div class="user">
            <a href="{{url('users/'.$user->id)}}">
                <strong> {{{$user->name}}} {{{$user->surname}}} </strong> ({{{$user->getPositionFriendlyName()}}})
                - {{{$user->group->name}}};
                @if($user->tasks->count() == 0)
                    no assigned tasks
                @elseif($user->tasks->count() == 1)
                    1 assigned task
                @else
                    {{{$user->tasks->count()}}} assigned tasks
                @endif
            </a>
        </div>
    @endforeach
@stop
