@extends('master')
@section('header')
    <h2>About this site</h2>
@stop
@section('content')
    <p>There are at least {{$number_of_users}} users on this site!</p>

    Groups: {{{Group::all()}}}
@stop