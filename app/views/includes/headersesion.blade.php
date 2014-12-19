    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container"><img class="navbar-brand" src="img/meatingLogo3.png"   HEIGHT="100px" ></img> <!style="width: 150px; height: auto;>
          <div class="navbar-header">
              <a class="navbar-brand">Meating</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="/">Inicio</a></li>
              <li><a href="/about">¿Que es Meating?</a></li>
              <li><a href="/aboutUs">¿Quienes somos?</a></li> 
              <li><a href="/contacto">Contacto</a></li>           
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Session::get('usuario_username')}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/MisEventos">Mis Eventos</a></li>
                        <li><a href="#">Mi Perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout">Cerrar Sesion</a></li>
                     </ul>
                </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>