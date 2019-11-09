<!DOCTYPE html>
<html>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

<head>
    @yield('title')
</head>

<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <b>   <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </b>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @can('users.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                    </li>
                @endcan
                @can('roles.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                    </li>
                @endcan
                @can('home')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Apps</a>
                    </li>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
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
                @endguest
            </ul>
        </div>
    </div>
</nav>

@if (session('info'))
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            </div>
        </div>
    </div>
@endif

<div class="row" id="body-row">
    @include('partials.lateralSidebar')
    <div class="col col-modify">
        @yield('page_content')
    </div>

</div><!-- body-row END -->
<!-- Bootstrap row -->

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    $(document).ready(function(id) {

        if(document.getElementById("mitabla")!=null){
            $('#mitabla').DataTable();
            var sidebar= document.getElementById("mitabla_filter").querySelector("label")
            sidebar.appendChild(document.createElement('i'))
            sidebar.querySelector("i").classList.add("fas");
            sidebar.querySelector("i").classList.add("fa-search");
            sidebar.querySelector("i").classList.add("search-icon");
        }


        var ocultar_sidebar = document.getElementById("ocultar_sidebar")

        ocultar_sidebar.addEventListener(("click"),function (e) {
            e.preventDefault()
        })
    });

    // Hide submenus
    $('#body-row .collapse').removeClass('show');

    // Collapse/Expand icon
    $('#collapse-icon').addClass('fa-angle-double-left');

    // Collapse click
    $('[data-toggle=sidebar-colapse]').click(function() {
        SidebarCollapse();
    });

    function SidebarCollapse () {
        $('.menu-collapsed').toggleClass('d-none');
        $('.sidebar-submenu').toggleClass('d-none');
        $('.submenu-icon').toggleClass('d-none');
        $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

        // Treating d-flex/d-none on separators with title
        var SeparatorTitle = $('.sidebar-separator-title');
        if ( SeparatorTitle.hasClass('d-flex') ) {
            SeparatorTitle.removeClass('d-flex');
        } else {
            SeparatorTitle.addClass('d-flex');
        }

        // Collapse/Expand icon
        $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
    }
</script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>

</html>
