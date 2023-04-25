<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3">Proyecto Crías</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item {{ Str::startsWith(request()->route()->uri(), 'crias') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#uno"
            aria-expanded="true" aria-controls="uno">
            <i class="fas fa-check"></i>
            <span>Crias</span>
        </a>
        <div id="uno" class="collapse {{ Str::startsWith(request()->route()->uri(), 'crias') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('crias.create') ? 'active' : '' }}" href="{{ route('crias.create') }}">Registrar cria</a>
                <a class="collapse-item {{ request()->routeIs('crias.index') ? 'active' : '' }}" href="{{ route('crias.index') }}">Crias registradas</a>
                <a class="collapse-item {{ request()->routeIs('crias.eliminadas') ? 'active' : '' }}" href="{{ route('crias.eliminadas') }}">Crias eliminadas</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Str::startsWith(request()->route()->uri(), 'crias') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dos"
            aria-expanded="true" aria-controls="dos">
            <i class="fas fa-check"></i>
            <span>Sensores</span>
        </a>
        <div id="dos" class="collapse {{ Str::startsWith(request()->route()->uri(), 'sensores') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('sensores.create') ? 'active' : '' }}" href="{{ route('sensores.create') }}">Registrar datos</a>
                <a class="collapse-item {{ request()->routeIs('sensores.index') ? 'active' : '' }}" href="{{ route('sensores.index') }}">Historial de sensores</a>
                <a class="collapse-item {{ request()->routeIs('sensores.eliminadas') ? 'active' : '' }}" href="{{ route('sensores.eliminadas') }}">Registros eliminados</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Str::startsWith(request()->route()->uri(), 'crias') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tres"
            aria-expanded="true" aria-controls="tres">
            <i class="fas fa-check"></i>
            <span>Dietas</span>
        </a>
        <div id="tres" class="collapse {{ Str::startsWith(request()->route()->uri(), 'dietas') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('dietas.index') ? 'active' : '' }}" href="{{ route('dietas.index') }}">Dietas registradas</a>
                <a class="collapse-item {{ request()->routeIs('dietas.eliminadas') ? 'active' : '' }}" href="{{ route('dietas.eliminadas') }}">Dietas eliminadas</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Str::startsWith(request()->route()->uri(), 'crias') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cuatro"
            aria-expanded="true" aria-controls="cuatro">
            <i class="fas fa-check"></i>
            <span>Proveedores</span>
        </a>
        <div id="cuatro" class="collapse {{ Str::startsWith(request()->route()->uri(), 'proveedores') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('proveedores.create') ? 'active' : '' }}" href="{{ route('proveedores.create') }}">Registrar proveedor</a>
                <a class="collapse-item {{ request()->routeIs('proveedores.index') ? 'active' : '' }}" href="{{ route('proveedores.index') }}">Proveedores registrados</a>
                <a class="collapse-item {{ request()->routeIs('proveedores.eliminadas') ? 'active' : '' }}" href="{{ route('proveedores.eliminados') }}">Proveedores eliminados</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
