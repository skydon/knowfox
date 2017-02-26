<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if (!empty($page_title)){{$page_title}} | @endif{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="{{ str_replace('.', '-', Route::currentRouteName()) }}{{ Route::currentRouteName() != 'home' ? ' not-home' : '' }}">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Concepts <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('concept.index')}}">All</a></li>
                                <li><a href="{{route('concept.toplevel')}}">Toplevel</a></li>
                                <li><a href="{{route('concept.flagged')}}">Flagged</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route('concept.create')}}"><i class="glyphicon glyphicon-plus-sign"></i> New concept</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ route('journal') }}"><i class="glyphicon glyphicon-grain"></i> Journal</a></li>
                    </ul>

                    @if (Route::currentRouteName() != 'home')
                        @include('partials.search-form', ['class' => 'navbar-form navbar-left'])
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
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
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="footer">
            <div class="container">
                <p class="text-muted">
                    &copy; {{ date('Y') }} Dr. Olav Schettler |
                    <a href="javascript:(function(){d=document.createElement('iframe');d.style='position:fixed;z-index:9999;top:10px;right:10px;width:200px;height:200px;background:#FFF;';d.src='https://knowfox.com/bookmark?url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title);document.body.appendChild(d);})()"><i class="glyphicon glyphicon-bookmark"></i> Bookmarklet</a>
                </p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('footer_scripts')
</body>
</html>
