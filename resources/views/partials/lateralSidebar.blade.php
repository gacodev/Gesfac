<!-- Sidebar -->
<div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
    <!-- Bootstrap List Group -->
    <ul class="list-group">
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>SANIDAD</small>
        </li>
        <!-- /END Separator -->
        <a href="{{ url('/agendar') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-stethoscope mr-3"></span>
                <small><span class="menu-collapsed">AGENDAR</span></small>
            </div>
        </a>
        <a href="{{ url('/sanidad') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-ambulance mr-3"></span>
                <small><span class="menu-collapsed">CONSULTAR</span></small>
            </div>
        </a>
        <a href="{{ url('/informes') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-list-ol mr-3"></span>
                <small><span class="menu-collapsed">INFORMES</span></small>
            </div>
        </a>
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>ALUMNOS</small>
        </li>
        <!-- /END Separator -->
        <!-- Menu with submenu -->
        <a href="{{ url('/registrar_alumno') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-user-tie mr-3"></span>
                <small><span class="menu-collapsed">REGISTRAR</span></small>
            </div>
        </a>

        <a href="{{ url('/armas') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-fighter-jet mr-3"></span>
                <small><span class="menu-collapsed">ARMAS</span></small>
            </div>
        </a>

        <a href="{{ url('/asignar_arm') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-arrow-alt-circle-right mr-3"></span>
                <small><span class="menu-collapsed">ASIGNAR</span></small>
            </div>
        </a>

        <a href="{{ url('/reportes') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-user-plus mr-3"></span>
                <small><span class="menu-collapsed">REPORTES</span></small>
            </div>
        </a>
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>VISITANTES</small>
        </li>
        <!-- /END Separator -->
        <a href="{{ url('/ingreso') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-user-check mr-3"></span>
                <small>  <span class="menu-collapsed">INGRESO</span>   </small>
            </div>
        </a>
        <a href="{{ url('/invitados') }}" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fas fa-user-plus mr-3"></span>
                <small><span class="menu-collapsed">REGISTRO INVITADOS</span></small>
            </div>
        </a>


        <!-- Separator without title -->
        <li class="list-group-item sidebar-separator menu-collapsed"></li>
        <!-- /END Separator -->
        <a href="" id="ocultar_sidebar" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                <small><span id="collapse-text" class="menu-collapsed"></span></small>
            </div>
        </a>
    </ul><!-- List Group END-->
</div><!-- sidebar-container END -->