@extends('master')
@section('header')<h2>Please Log In</h2>@stop
@section('content')
    {{Form::open()}}
    <div class="modal-body">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
    <div class="form-group">
        <label for="email" class="control-label">Username</label>
        <input type="text" class="form-control" id="email" name="email" value="" required="" title="Please enter you email" placeholder="name@company.com">
    </div>
    <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
    </div>
    <button type="submit" class="btn btn-success btn-block">Login</button>
        </div>
        </div>
        </div>
    {{Form::close()}}
@stop