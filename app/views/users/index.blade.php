@extends('master')

@section('header')
    @if(isset($group))
        {{link_to('/', 'Back to the overview')}}
    @endif
    <h2>
        All @if(isset($group)) {{$group->name}} @endif Groups
        <a href="{{url('groups/create')}}" class="btn btn-primary pull-right">
            Add a new group
        </a>
    </h2>
@stop
@section('content')
    @foreach($users as $user)
        <div class="user">
            <a href="{{url('user/'.$user->id)}}">
                <strong> {{{$user->name}}} </strong> - {{{$user->group->name}}}
            </a>
        </div>
    @endforeach
@stop
