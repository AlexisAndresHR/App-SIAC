<div class="sidebar shadow">
    
    <nav role="navigation">
        <div id="menuToggle">
            <!-- A fake / hidden checkbox is used as click reciever, so you can use the :checked selector on it -->
            <input type="checkbox" />
            
            <!-- Some spans to act as a hamburger -->
            <span></span>
            <span></span>
            <span></span>
            
            <!-- Too bad the menu has to be inside of the button but hey, it's pure CSS magic -->
            <ul id="menu">
                <!-- User and org info section -->
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

                <!-- List menu section -->
                <a href="{{ route('admin-panel') }}"> <li> <i class="fas fa-home"></i> &nbsp; Inicio </li> </a>
                <a href="{{ route('get-solicitudes') }}"> <li> <i class="fas fa-file-alt"></i> &nbsp; Solicitudes </li> </a>
                <a href="{{ route('get-secretarias') }}"> <li> <i class="fas fa-building"></i> &nbsp; Secretarías </li> </a>
                <a href="{{ url('admin/') }}"> <li> Dependencias </li> </a>
                <a href="{{ url('admin/') }}"> <li> ... </li> </a>
            </ul>
        </div>
    </nav>

</div>