<div class="sidebar shadow">
    
    <!-- User and org info section -->
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/images/org_logo.png') }}" class="img-fluid">
        </div>

        <div class="user">
            <div class="subtitle">
                <b> ¡Hola! {{ Auth::user()->nombre }} </b>
            </div>
            <div class="subtitle">
                <a href="{{ url('logout') }}"> Salir <i class="fas fa-sign-out-alt"></i> </a>
            </div>
        </div>
    </div>

    <!-- List menu section -->
    <div class="main">
        <ul>
            <li>
                <a href="{{ route('admin-panel') }}"> <i class="fas fa-home"></i> Inicio </a>
            </li>
            <li>
                <a href="{{ route('get-solicitudes') }}"> <i class="fas fa-file-alt"></i> Solicitudes </a>
            </li>
            <li>
                <a href="{{ route('get-secretarias') }}"> <i class="fas fa-building"></i> Secretarías </a>
            </li>
            <li>
                <a href="{{ url('admin/') }}"> ... </a>
            </li>
        </ul>
    </div>

</div>