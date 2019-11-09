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

    @include('partials.sidebar')
</head>
<body>

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
