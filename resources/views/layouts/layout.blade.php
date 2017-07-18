<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <title>{{ $pageTitle }} - NeverBackDown</title>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="nav-logo" href="{{ route('home') }}">NeverBackDown</a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-list-item @if ($pageTitle === "Home") active @endif">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-list-item @if ($pageTitle === "Forum") active @endif">
                    <a class="nav-link" href="#">Forum</a>
                </li>
                <li class="nav-list-item @if ($pageTitle === "News") active @endif">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-list-item @if ($pageTitle === "Members") active @endif">
                <a class="nav-link" href="#">Members</a>
                </li>
                <li class="nav-list-item @if ($pageTitle === "About") active @endif">
                <a class="nav-link" href="#">About</a>
                </li>
                @if (Auth::check())
                    <li class="nav-list-item">
                        <a class="nav-link" href="#">{{ Auth::user()->username }}</a>
                    </li>
                    <li class="nav-list-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li class="nav-list-item @if ($pageTitle === "Login") active @endif">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container body-content">
    @yield('body')
</div>

<footer>
</footer>
<script type="text/javascript" src="{{ url("js/jquery.js") }}"></script>
<script type="text/javascript" src="{{ url("js/bootstrap.js") }}"></script>
@yield('scripts')
</body>
</html>
