<!DOCTYPE html>
<html>
    <head>
        <title>{!! Theme::get('title') !!}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{!! Theme::get('keywords') !!}">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <meta name="description" content="{!! Theme::get('description') !!}">
        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}
    </head>
    <body>
        <input type="hidden" id="baseURL" value="{{ url('') }}" >
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Logo -->
                        <div class="logo">
                            <h1><a href="index.html">Bootstrap Admin Theme</a></h1>
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <div class="navbar navbar-inverse" role="banner">
                            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<b class="caret"></b></a>
                                        <ul class="dropdown-menu animated fadeInUp">
                                            <li><a href="profile.html">Profile</a></li>
                                            <li><a href="/logout">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar content-box" style="display: block;">
                        <ul class="nav">
                            <!-- Main menu -->
                            @if(Auth::user()->user_type == 1)
                            <li class="current"><a href="{{url('admin/clients')}}"><i class="glyphicon glyphicon-home"></i>asd</a></li>
                            <li><a href="{{url('admin/menus')}}"><i class="glyphicon glyphicon-calendar"></i>asd</a></li>
                            <li><a href="{{url('admin/ingredients')}}"><i class="glyphicon glyphicon-calendar"></i>asd</a></li>
                            <li><a href="{{url('admin/graphs')}}"><i class="glyphicon glyphicon-calendar"></i>asd</a></li>
                            @endif

                            @if(Auth::user()->user_type == 2)
                                <li class="current"><a href="{{url('kitchen/kitchen')}}"><i class="glyphicon glyphicon-home"></i>Orders</a></li>
                                <li><a href="{{url('kitchen/menus')}}"><i class="glyphicon glyphicon-calendar"></i>Menus</a></li>
                                <li><a href="{{url('kitchen/ingredients')}}"><i class="glyphicon glyphicon-calendar"></i>Ingredients</a></li>
                            @endif
                    </div>
                </div>
                <div class="col-md-10">
                    {!! Theme::content() !!}
                </div>
            </div>
        </div>

        {!! Theme::asset()->container('footer')->scripts() !!}
    </body>
</html>
