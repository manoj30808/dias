<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            @if (!Auth::guest())
                <ul class="nav navbar-nav">
                  <li><a href="{{ url('home') }}">Home</a></li>
                    @permission('manage-users')
                        <li><a href="{{ url('user') }}">Users</a></li>
                    @endpermission
                    @permission('manage-roles')
                        <li><a href="{{ url('role') }}">Roles</a></li>
                    @endpermission
                    @permission('manage-permission')
                        <li><a href="{{ url('permission') }}">Permission</a></li>
                    @endpermission
                </ul>
            @endif
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
          </div>
        </nav>
        {{-- NOTIFICATION --}}
        @if(!Auth::guest())
           @include('layouts.partials.notifications')
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
