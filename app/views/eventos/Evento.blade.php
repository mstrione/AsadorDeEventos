<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('includes.headersesion')
    {{ HTML::script('js/vallenato.js') }}
    {{ HTML::style('css/vallenato.css') }}
    {{ HTML::script('js/datepicker.js') }}
    {{ HTML::script('js/MapaEvento.js') }}
    {{ HTML::script('js/cuentas.js') }}
    {{ HTML::style('css/datepicker.css') }} 
    {{ HTML::style('css/EstiloMapa.css') }}
    {{ HTML::script('js/jquery-2.1.1.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/FuncionesDeEventos.js') }}
    {{ HTML::style('css/StyleComun.css') }}
    {{ HTML::style('css/StyleIndex.css') }}
    {{ HTML::style('css/bootstrap.min.css') }}
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script >google.maps.event.addDomListener(window, 'load', initialize);  
    </script>
    <script>//function centerModal() {
//     $(this).css('display', 'block');
//     var $dialog = $(this).find(".modal-dialog");
//     var offset = ($(window).height() - $dialog.height()) / 2;
//     // Center modal vertically in window
//     $dialog.css("margin-top", offset);
// }

// $('.modal').on('show.bs.modal', centerModal);
// $(window).on("resize", function () {
//     $('.modal:visible').each(centerModal);
// });</script>

    <title>AdE - Contacto</title>    
</head>
<body>
 

    <div class="container"> 
        <div class="well"> 
                @if(Session::has('message'))
                    <div class="alert alert-{{Session::get('class')}} ">{{Session::get('message')}}</div>
                @endif
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

                                <div class="form-group">
                                    
                                    <div class="col-lg-10">
                                      <input class="form-control" id="disabledInput" name="Latitud" type="text" value ="{{$TEvento->latitud}}" placeholder="" disabled="" style="display: none">
                                    </div>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="disabledInput" name="Longitud" type="text" value ="{{$TEvento->longitud}}" placeholder="" disabled="" style="display: none">
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
                        @if((Session::get('usuario_id'))==($TEvento->creador))
                        <a href="#" class="btn btn-primary">Editar Evento</a>
                        @endif


                    </form>                        
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
             @if(Session::get('usuario_id')==($TEvento->creador))
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="form-group">
                        {{Form::label('lista cerrada?')}}
                        {{Form::checkbox('EstadoDeLalista', 'abierta',array('onclick'=>'CambiaEstado()'))}}                    
                    </div>
                </div>
            </div>
                
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">agregar invitado </button>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'InvitadoController@invitar' , 'role' => 'form'))}}
                                <fieldset>
                                    <legend>Nuevo Invitado</legend>
                                    <div class="form-group" >
                                      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="email" placeholder="Email">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="inputPassword" class="col-lg-2 control-label">Nombre</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="nombre" placeholder="Nombre">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-10 col-lg-offset-2">
                                      {{form::input('hidden','ideventoN',$TEvento->id)}}
                                        <p>{{Form::submit('Enviar', array('class' => 'btn btn-default'))}}</p>
                                      </div>
                                    </div>
                                </fieldset>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            @endif

                        <!--fin pop up code -->
            <table class='table table-striped table-hover'>
                <thead>
                
                   <th>Nombre</th>
                   <th>asistirá</th>
                   <th>adultos</th>
                   <th>niños</th>
                   @if(Session::get('usuario_id')==($TEvento->creador))
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
                    <?php $Ninvitado=Usuario::find($invitado->idusuario)?>
                        <td>{{$Ninvitado->username}}</td>
                        @if(($invitado->confirmado) ==1)                        
                            <td class="glyphicon glyphicon-ok-sign"></td>
                        @else
                            @if(($invitado->confirmado) ==2)
                                <td class="glyphicon glyphicon-minus-sign"></td>
                            @else
                                <td class="glyphicon glyphicon-question-sign"></td>
                            @endif
                        @endif
                        <td>{{$invitado->adultos}}</td>
                        <td>{{$invitado->menores}}</td>
                        @if(Session::get('usuario_id')==$TEvento->creador)
                            <td>{{$invitado->notificado}}</td>
                            <td>{{$invitado->gasto}}</td>
                            <td>{{$invitado->costo}}</td>
                            <td>{{$invitado->balance}}</td>
                            <td>#</td>
                            <td>#</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @if(Session::get('usuario_id')==$TEvento->creador)   
            <a href="#" class="btn btn-primary btn-sm">Enviar invitacion a no notificacion</a>
            <a href="#" class="btn btn-primary btn-sm">Reenviar invitacion a no confirmados</a>
            <a href="#" class="btn btn-primary btn-sm">Enviar Cuentas a Asistentes</a>
        
            <div class="page-header">
                <legend><h1 id="navbar">Cuentas</h1></legend>
            </div>
            <!-- PARTE DE LAS CUENTAS Form::checkbox('name', 'value');-->
            <div class="col-lg-6 col-lg-offset-0">
                <form class="bs-component">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">CUENTAS</h3>
                        </div>    
                        <div >
                            <div>
                            {{ Form::radio('metodo', '1', (Input::old('metodo') == '1'), array('id' =>'radio' ,'onclick'=>'opcion1()'))}}    
                            {{Form::label('El organizador invita')}}    
                                
                            </div>
                            
                            <div>
                            {{Form::radio('metodo', '2', (Input::old('metodo') == '2'), array('id' =>'radio' ,'onclick'=>'opcion2()' ))}}
                            {{Form::label('Se establece un valor fijo')}}               
                            </div>                            
                            <div>
                            {{ Form::radio('metodo', '3', (Input::old('metodo') == '3'), array('id' =>'radio' ,'onclick'=>'opcion3()'  ))}}    
                            {{Form::label('Se establece un valor fijo por asistente')}}             
                            </div>
                            
                            <div>
                            {{Form::radio('metodo', '4', (Input::old('metodo') == '4'), array('id' =>'radio' ,'onclick'=>'opcion4()' ))}}
                            {{Form::label('Se divide lo gastado en partes iguales')}}               
                            </div>
                            
                            <div>
                            {{Form::radio('metodo', '5', (Input::old('metodo') == '5'), array('id' =>'radio' ,'onclick'=>'opcion5()'  ))}} 
                            {{Form::label('Se divide lo gastado según asistentes')}}
                            
                            </div>
                            
                            <div>
                            {{Form::radio('metodo', '6', (Input::old('metodo') == '6'), array('id' =>'radio' ,'onclick'=>'opcion6()'))}}
                            {{Form::label('Se divide un valor arbitrario en partes iguales')}}              
                            </div>
                            
                            <div>
                            {{Form::radio('metodo', '7', (Input::old('metodo') == '7'), array('id' =>'radio' ,'onclick'=>'opcion7()'  ))}}
                            {{Form::label('Se divide un valor arbitrario según asistentes')}}               
                            </div>
                        </div>
                    </div>
                </form>                        
            </div>
            <div class="col-lg-6 col-lg-offset-0">
                <div class="bs-component">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Metodo</h3>
                        </div>
                            <div class="miscuentas">
                                {{-- opcion 1 --}}
                                {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'InvitadoController@cuenta' , 'role' => 'form'))}}
                                <div id="opcion1" style="">
                                    <p>El organizador invita</p>
                                    {{form::input('hidden','ideventoN',$TEvento->id)}}
                                    {{form::input('hidden','opcionNum',1)}}
                                    <div>
                                        <input type="submit" value="Aceptar">
                                    </div>
                                </div>
                                {{Form::close()}}

                                

                                {{-- opcion 2 se establece un costo fijo--}}
                                {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'InvitadoController@cuenta' , 'role' => 'form'))}}
                                <div id="opcion2" style="display:none">
                                    <p>costo por invitado</p>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                          <input class="form-control"  name="valor" type="text">
                                        </div>
                                    </div>
                                    {{form::input('hidden','ideventoN',$TEvento->id)}}
                                    {{form::input('hidden','opcionNum',2)}}
                                    <div>
                                        <input type="submit" value="Aceptar">
                                    </div>
                                </div>
                                {{Form::close()}}

                                {{-- opcion 3 --}}
                                {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'InvitadoController@cuenta' , 'role' => 'form'))}}
                                <div id="opcion3" style="display:none">
                                    <p>costo por asistentes</p>
                                    <div class="form-group">
                                        <div class="col-lg-2">                                        
                                          <input class="form-control"  name="adultos" type="text">{{Form::label('adultos')}}
                                        </div>
                                        <div class="col-lg-2">
                                          <input class="form-control"  name="niños" type="text">{{Form::label('niños')}}
                                        </div>
                                    </div>
                                    {{form::input('hidden','ideventoN',$TEvento->id)}}
                                    {{form::input('hidden','opcionNum',3)}}
                                    <div>
                                        <input type="submit" value="Aceptar">
                                    </div>
                                </div>
                                {{Form::close()}}   

                                {{-- opcion 4 --}}
                                {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'InvitadoController@cuenta' , 'role' => 'form'))}}
                                <div id="opcion4" style="display:none">
                                    <div class="form-group">
                                        <div class="col-lg-10">                                        
                                          {{Form::label('Dividir lo gastado en partes iguales')}}
                                        </div>
                                        {{form::input('hidden','ideventoN',$TEvento->id)}}
                                        {{form::input('hidden','opcionNum',4)}}
                                        <div>
                                            <input type="submit" value="Aceptar">
                                        </div>
                                    </div>                                    
                                </div> 
                                {{Form::close()}}

                                {{-- opcion 5 --}}
                                {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'InvitadoController@cuenta' , 'role' => 'form'))}}
                                <div id="opcion5" style="display:none">
                                    <p>Dividir lo gastado segun los asistentes</p>
                                    <div class="form-group">
                                        <div class="col-lg-2">                                        
                                          <input class="form-control"  name="adultos5" type="text">{{Form::label('adultos')}}
                                        </div>
                                        <div class="col-lg-2">
                                          <input class="form-control"  name="niños5" type="text">{{Form::label('niños')}}
                                        </div>
                                    </div>
                                    {{form::input('hidden','ideventoN',$TEvento->id)}}
                                    {{form::input('hidden','opcionNum',5)}}
                                    <div>
                                        <input type="submit" value="Aceptar">
                                    </div>                                   
                                </div>
                                {{Form::close()}} 

                                {{-- opcion 6 --}}
                                {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'InvitadoController@cuenta' , 'role' => 'form'))}}
                                <div id="opcion6" style="display:none">
                                    <p>Valor a dividir en partes iguales</p>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                          <input class="form-control"  name="valor" type="text">
                                        </div>
                                    </div>
                                    {{form::input('hidden','ideventoN',$TEvento->id)}}
                                    {{form::input('hidden','opcionNum',6)}}
                                    <div>
                                        <input type="submit" value="Aceptar">
                                    </div>
                                </div>
                                {{Form::close()}}

                                {{-- opcion 7 --}}
                                {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'InvitadoController@cuenta' , 'role' => 'form'))}}
                                <div id="opcion7" style="display:none">
                                    <p>Se divide valor según asistentes</p>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input class="form-control"  name="valor" type="text"><br>

                                            <div class="col-lg-2">                                        
                                              <input class="form-control"  name="adultos7" type="text">{{Form::label('adultos')}}
                                            </div>
                                            <div class="col-lg-2">
                                              <input class="form-control"  name="niños7" type="text">{{Form::label('niños')}}
                                            </div>
                                            {{form::input('hidden','ideventoN',$TEvento->id)}}
                                            {{form::input('hidden','opcionNum',7)}}                                    
                                            <input type="submit" value="Aceptar">
                                        </div>
                                    </div><br><br><br><br>
                                </div>
                                {{Form::close()}}
                        </div><br><br>
                    </div>
                </div>
            </div>
    @endif          
            <div class="page-header">
                <legend><h1 id="navbar">Lista de Compras</h1></legend>
            </div>

            <!-- pop up de agregar item -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalItem">Agregar Item </button>
            <div id="myModalItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'EventoController@AgregarItem' , 'role' => 'form'))}}
                                <fieldset>
                                    <legend>Nuevo item</legend>
                                    <div class="form-group" >
                                      <label class="col-lg-2 control-label">Item</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="Item" placeholder="ej: chorizos por unidad">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Cantidad</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="Cantidad" placeholder="Cantidad">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-10 col-lg-offset-2">
                                      {{form::input('hidden','ideventoN',$TEvento->id)}}
                                        <p>{{Form::submit('Enviar', array('class' => 'btn btn-default'))}}</p>
                                      </div>
                                    </div>
                                </fieldset>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN DEL pop up de agregar item -->

            <!-- pop up de llevar item -->
            <div id="myModalLlevarItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'EventoController@llevarItem' , 'role' => 'form'))}}
                                <fieldset>
                                    <legend>llevar Item</legend>
                                    <div class="form-group" >
                                      <label class="col-lg-2 control-label">Item</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="ItemAllevar" id="ItemAllevar"  disabled="true">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Cantidad a llevar</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="Cantidad" placeholder="Cantidad">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-10 col-lg-offset-2">
                                      <input type="text" class="form-control"  name="iditem" style="display:none" id="iditem">
                                      {{form::input('hidden','iddelusuario',Session::get('usuario_id'))}}
                                      {{form::input('hidden','ideventoN',$TEvento->id)}}
                                        <p>{{Form::submit('Enviar', array('class' => 'btn btn-default'))}}</p>
                                      </div>
                                    </div>
                                </fieldset>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            <!--Fin de  pop up de LLEVAR item -->

            <!-- de  pop up de ASIGNAR item -->
            <div id="myModalasignarItem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'EventoController@AsignarItem' , 'role' => 'form'))}}
                                <fieldset>
                                    <legend>Asignar Item</legend>
                                    <div class="form-group" >
                                      <label class="col-lg-2 control-label">Asignar A:</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="UsuarioAAsignar" id="UsuarioAAsignar">
                                      </div>
                                    </div>

                                    <div class="form-group" >
                                      <label class="col-lg-2 control-label">Item</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="ItemAAsignar" id="ItemAAsignar"  disabled="true">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Cantidad a llevar</label>
                                      <div class="col-lg-10">
                                        <input type="text" class="form-control"  name="CantidadAsignada" placeholder="CantidadAsignada">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-10 col-lg-offset-2">
                                      <input type="text" class="form-control"  name="iditem" style="display:none" id="iditem2">
                                      {{form::input('hidden','iddelusuario',Session::get('usuario_id'))}}
                                      {{form::input('hidden','ideventoN',$TEvento->id)}}
                                        <p>{{Form::submit('Enviar', array('class' => 'btn btn-default'))}}</p>
                                      </div>
                                    </div>
                                </fieldset>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN de  pop up de ASIGNAR item -->

            <table class='table table-striped table-hover'>
                <thead>
                    <th>¿Qué Hace Falta?</th>
                    <th>¿Quién trae?</th>
                    <th>¿Cuantos?</th>
                    <th>Faltan</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($listaDeItems as $item)
                    <tr> 
                        <td>{{$item->nombre}}</td><td>
                        <?php $contador=0;?>
                        @foreach($ListaDeItemsOks as $elementOK)                     
                            @if($elementOK->iditem == $item->id)

                                <?php $NomUser=Usuario::find($elementOK->idusuario)?>
                                <div>
                                <button class="btn btn-info"><span class="badge" >{{$elementOK->cantidad}} </span>{{$NomUser->username}} <a href="" class="close">x</a></button>
                                </div>
                                
                                <?php $contador=$contador+($elementOK->cantidad)?>                               
                                
                            @endif    
                        @endforeach </td>
                        <td>{{$contador}}/{{$item->cantidad}}</td>
                        <td>{{($item->cantidad)}}</td>
                        <td><a href="" data-toggle="modal" data-target="#myModalLlevarItem" onclick="AsignaIdItem({{$item->id}},'{{$item->nombre}}')">yo llevo!</a><a href="" data-toggle="modal" data-target="#myModalasignarItem" onclick="AsignaIdItem2({{$item->id}},'{{$item->nombre}}')"> asignar <a href="{{ url('/Evento/destroy',$item->id) }}" class="btn btn-danger" >
                        <span class="glyphicon glyphicon-trash"></span></a></td>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

                <div class="page-header">
                <legend><h1 id="navbar">Fotos del Evento</h1></legend>
    </div>





{{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'EventoController@imagenes' , 'role' => 'form' ,'files'=>true ))}}
{{Form::label('file','fotos: ')}}
{{Form::file('file')}}
{{form::input('hidden','ideventoN',$TEvento->id)}}

{{Form::submit('upload',array('class'=>'btn btn-success'))}}


        </div><!--well-->
    </div><!--div del contenedor-->



    

    
</body>
    <div id="footer">
        <!-- FOOTER -->
        <footer id="mainFooter">
            <div class="wrapped" align="center"> <!--Anclamos un footer abajo del todo de la pagina-->
                <p class="pull-right"><a id="goTop" href="#"><h3> ^ </h3></a></p> <!--con ese icono nos lleva hacia arriba de la pagina-->
                <p>© 2015 Asador De Eventos   ·  <a href="/terminos">Privacidad y Términos</a> · Seguinos en <!--nos va a llevar a los links mencionados abajo a traves de los iconos-imagenes-->
                    <a href="http://facebook.com"><img src="../img/f1.png" height='30' width='70'></a> | 
                    <a href="http://twitter.com"><img src="../img/t1.png" height='30' width='70'></a> |
                    <a href="http://plus.google.com/share"><img src="../img/g1.png" height='30' width='70'></a>
                    
                </p>
            </div>
        </footer>
    </div>
</html>