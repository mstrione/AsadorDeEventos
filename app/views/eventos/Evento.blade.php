<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('includes.headersesion')
    {{ HTML::script('js/vallenato.js') }}
    {{ HTML::style('css/vallenato.css') }}
    {{ HTML::script('js/datepicker.js') }}
    {{ HTML::script('js/MapaEvento.js') }}
    {{ HTML::style('css/datepicker.css') }} 
    {{ HTML::style('css/EstiloMapa.css') }}
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script >google.maps.event.addDomListener(window, 'load', initialize);  
    </script>

</head>
<body>
 @include('includes.headEventoX')

    <div class="container"> 
        <div class="well"> 
            <div><h1 id="type"> Mis Eventos</h1></div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="well bs-component">
                        <form class="form-horizontal">
                            <fieldset>
                                <legend>Datos del evento</legend>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Nombre del evento</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="disabledInput" type="text" value ="{{$TEvento->nombre}}"placeholder="" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Lugar</label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="disabledInput" type="text" value ="{{$TEvento->direccion}}"placeholder="" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">fecha y hora </label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="disabledInput" type="text" value ="{{$TEvento->fecha}}  {{$TEvento->hora}} " placeholder="" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label">Descripcion del evento</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="3" id="textArea" disabled="" >{{$TEvento->descripcion}}</textarea>        
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 col-lg-offset-0">
                    <form class="bs-component">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Posición del Evento</h3>
                            </div>
                            <div class="panel-body">
                                <div  id="mapaevento"></div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary">Editar Evento</a>         
                    </form>
                </div>
            </div>
            <div class="page-header">
                <h1 id="navbar">Mensajes</h1>
            </div>
            <div class="form-group">
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="textArea" disabled=""></textarea>     
                </div>
            </div>
<br><br>

            <div class="page-header">
                <h1 id="navbar">invitados</h1>
            </div>
            <div class="form-group">
              <label for="select" class="col-lg-1 control-label">lista cerrada</label>
              <div class="col-lg-1">
                <select class="form-control" id="select">
                  <option>Si</option>
                  <option>No</option>
                </select>
                <br>
              </div>
            </div>
                
            <div align="right"><a href="/crearEvento" class="btn btn-primary" >Agregar invitado +</a></div><br>
            <table class='table table-striped table-hover'>
                <thead>
                   <th>Nombre</th>
                   <th>asistirá</th>
                   <th>adultos</th>
                   <th>niños</th>
                   <th>notificado</th>
                   <th>gasto</th>
                   <th>Costo</th>
                   <th>Balance</th>
                   <th>$ok</th>
                   <th>Acciones</th>
                </thead>
            </table>
            <a href="#" class="btn btn-primary btn-sm">Enviar invitacion a no notificacion</a>
            <a href="#" class="btn btn-primary btn-sm">Reenviar invitacion a no confirmados</a>
            <a href="#" class="btn btn-primary btn-sm">Enviar Cuentas a Asistentes</a>
        </div>

        </div>

    </div>
  
  
</body>
    @include('includes.footer')
</html>