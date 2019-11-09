<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#"><b>Alesufa</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav navbar-nav ml-auto">
            @can('users.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}"><b>Usuarios</b></a>
                </li>
            @endcan
            @can('roles.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}"><b>Roles</b></a>
                </li>
            @endcan
            @can('home')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><b>Apps</b></a>
                </li>
            @endcan
        </ul>
    </div>
</nav>
