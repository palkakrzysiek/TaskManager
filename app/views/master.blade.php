<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Manager</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/customized.css')}}">
</head>
<body>
<div class="container">
    <div class="navbar-top">
        <div class="text-right">
            @if(Auth::check())
                Logged in as
                <strong>{{{Auth::user()->name}}} {{{Auth::user()->surname}}}</strong>
            @endif
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="/">EMangaer</a>
                </div>

                <div class="collapse navbar-collapse">
                    @if(!Auth::check() and !Request::is('login*'))
                        <a class="btn btn-default navbar-btn navbar-right" href="/login">Log In</a>
                    @endif
                    @if(Auth::check())
                        <a class="btn btn-default navbar-btn navbar-right" href="{{URL::to('logout?_token='.csrf_token())}}">Log Out</a>
                    @endif
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            <li role="presentation"
                                @if(Request::is('users/'.Auth::user()->id))class="active"@endif>{{link_to('users/'.Auth::user()->id, 'Your profile')}}</li>
                            <li role="presentation"
                                @if(Request::is('users*') and !Request::is('users/'.Auth::user()->id))class="active"@endif>{{link_to('users', 'Employees')}}</li>
                        @else
                            <li role="presentation"
                                @if(Request::is('users*'))class="active"@endif>{{link_to('users', 'Employees')}}</li>
                        @endif
                        <li role="presentation"
                            @if(Request::is('tasks*'))class="active"@endif>{{link_to('tasks', 'Tasks')}}</li>
                        <li role="presentation"
                            @if(Request::is('projects*'))class="active"@endif>{{link_to('projects', 'Projects')}}</li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>

    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-warning">
            {{Session::get('error')}}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">@yield('header')</div>
        <div class="panel-body">
            @yield('content')
        </div>
    </div>





</div>
</body>
</html>