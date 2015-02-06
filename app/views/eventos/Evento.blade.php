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
    <script>function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});</script>

</head>
<body>
 @include('includes.headEventoX')

    <div class="container"> 
        <div class="well"> 
            <div><h1 id="type">Evento</h1></div>
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
                        @if(Session::has('usuario_id')==$TEvento->creador)
                        <a href="#" class="btn btn-primary">Editar Evento</a>
                        @endif

                        <button id="popup" onclick="div_show()">Popup</button>

                        <!--pop up code -->



                        
                </div>
            </div>
            <div class="page-header">
                <h1 id="navbar">Mensajes</h1>
            </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="textArea" disabled=""></textarea> 
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Enviar</button>
                            </span>
                        </div>    
                    </div>
                </div>
                
<br><br>

            <div class="page-header">
                <legend><h1 id="navbar">invitados</h1></legend>
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
                
            <!--<div align="right"><a href="/crearEvento" class="btn btn-primary" >Agregar invitado +</a></div><br>-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">agregar invitado </button>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <!--<img src="//placehold.it/1000x600" class="img-responsive">-->
                        <form class="form-horizontal">
  <fieldset>
    <legend>Nuevo Invitado</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputNombre" placeholder="Nombre">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Enviar invitacion</button>
      </div>
    </div>
  </fieldset>
</form>


                    </div>
                </div>
              </div>
            </div>
                        <!--fin pop up code -->
            <table class='table table-striped table-hover'>
                <thead>
                
                   <th>Nombre</th>
                   <th>asistirá</th>
                   <th>adultos</th>
                   <th>niños</th>
                   @if(Session::has('usuario_id')==$TEvento->creador)
                   <th>notificado</th>
                   <th>gasto</th>
                   <th>Costo</th>
                   <th>Balance</th>
                   <th>$ok</th>
                   <th>Acciones</th>
                   @endif
                </thead>
                <tbody>
                @foreach($listaDeInvitados as $invitado)
                    <tr>   
                        <td>{{$invitado->idusuario}}</td>
                        <td>{{$invitado->confirmado}}</td>
                        <td>{{$invitado->adultos}}</td>
                        <td>{{$invitado->menores}}</td>
                        @if(Session::has('usuario_id')==$TEvento->creador)
                        <td>{{$invitado->notificado}}</td>
                        <td>{{$invitado->gasto}}</td>
                        <td>{{$invitado->costo}}</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
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