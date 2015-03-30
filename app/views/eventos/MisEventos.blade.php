<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Mis Eventos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/StyleComun.css" rel="stylesheet">
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>--> 
    {{ HTML::script('js/FuncionesDeMisEventos.js') }}
    {{ HTML::script('js/jquery-2.1.1.js') }}

</head>
<body>
  	<!--barra de menu-->    
    @include('includes.headersesion')

    <div class="container"> 
    	<div class="well"> 
	        <div><h1 id="type"> Mis Eventos</h1></div>
                <div align="right"><a href="/crearEvento" class="btn btn-primary" >Agregar Evento +</a></div><br>		
                @if(Session::has('message'))
                <div class="alert alert-{{Session::get('class')}} ">{{Session::get('message')}}</div>
                @endif
    

            <table class='table table-striped table-hover'>
            	<thead>
               	   <th>NOMBRE</th>
            	   <th>LUGAR</th>
            	   <th>FECHA</th>
            	   <th>ORGANIZADOR</th>
            	   <th>ACCIONES</th>
            	</thead>
        	    <tbody>
                <?php $iddelevento=-1?>
                @foreach ($listaDeInvitados as $invitados)
                    @if ($invitados->idusuario == Session::get('usuario_id'))
                        <?php $iddelevento= $invitados->idevento  ?>
                    @endif
                @endforeach
                <?php $EstadoDelEvento=Evento::find($iddelevento);?>
                @foreach ($listaDeEventos as $value )
                @if ($value->creador == Session::get('usuario_id') ) 
                  <?php $usuarios=Usuario::find($value->creador)?>
                  <tr>   
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->direccion}}</td>
                        <td>{{$value->fecha}}</td>
                        <td>{{{$usuarios->username }}}</td> 
                        <td>
                        <button class="btn btn-info" id="{{$value->id}}" onclick="VerEvento(this.id)">
                        <span class="glyphicon glyphicon-eye-open" ></span></button>
                        <a href="{{ url('/MisEventos/destroy',$value->id) }}" class="btn btn-danger" >
                        <span class="glyphicon glyphicon-trash"></span></a> </td>
                    </tr>
                @endif
                @if ($value->id ==$iddelevento)
                <?php $usuarios=Usuario::find($value->creador)?>
                <?php $usurioYestado=Invitado::where('idusuario','=',Session::get('usuario_id'))->where('idevento','=',$iddelevento)->get()?>
                @foreach($usurioYestado as $EstadoDelUser)

                    <tr>
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->direccion}}</td>
                        <td>{{$value->fecha}}</td>
                        <td>{{{$usuarios->username }}}</td>
                        @if($EstadoDelUser->confirmado == 1) 
                         <td> <button class="btn btn-info" id="{{$value->id}}" onclick="VerEvento(this.id)"><span class="glyphicon glyphicon-eye-open" ></span></button>
                         @if($EstadoDelEvento->cerrado==1)
                            <button class="btn btn-success"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal" disabled="true"><span class="glyphicon glyphicon-cutlery"  ></span></button><button class="btn btn-danger"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal2" ><span class="glyphicon glyphicon-shopping-cart" ></span></button></td>
                            @else
                                <button class="btn btn-success"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-cutlery" ></span></button><button class="btn btn-danger"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal2" ><span class="glyphicon glyphicon-shopping-cart" ></span></button></td>
                            @endif

                        @else
                            @if($EstadoDelEvento->cerrado==1)
                            <td> <button class="btn btn-info" id="{{$value->id}}" onclick="VerEvento(this.id)"><span class="glyphicon glyphicon-eye-open" ></span></button><button disabled="true" class="btn btn-success"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-cutlery" ></span></button><button class="btn btn-danger"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal2" disabled="true"><span class="glyphicon glyphicon-shopping-cart" ></span></button></td>
                            @else
                             <td> <button class="btn btn-info" id="{{$value->id}}" onclick="VerEvento(this.id)"><span class="glyphicon glyphicon-eye-open" ></span></button><button class="btn btn-success"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-cutlery" ></span></button><button class="btn btn-danger"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal2" disabled="true"><span class="glyphicon glyphicon-shopping-cart" ></span></button></td>
                            @endif
                        @endif
                    </tr>
                    @endforeach
                @endif
                
                @endforeach
        	   </tbody>
            </table>
        </div>
    </div>
     <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'MisEventosController@gastos' , 'role' => 'form'))}}
                                <fieldset>
                                    <legend>Gastos Realizados</legend>
                                    <div class="form-group" >
                                      <label for="inputEmail" class="col-lg-5 control-label">$ </label>
                                      <div class="col-lg-2">
                                        <input type="text" class="form-control" name="MisGastos"  id="MisGastos" >
                                      </div>
                                    </div>
                                    <input type="hidden" value="" id="iddelevento2" name="iddelevento">
                                    <input type="hidden" value="{{Session::get('usuario_id')}}" name="myuser">

                                    <div class="form-group">
                                      <div class="col-lg-6 col-lg-offset-2">
                                        {{Form::submit('Enviar', array('class' => 'btn btn-default'))}}
                                      </div>
                                    </div>
                                </fieldset>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div> 

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'MisEventosController@asistencia' , 'role' => 'form'))}}
                                <fieldset>
                                    <legend>Acciones</legend>

                                    {{ Form::label('Asistir','Asistir') }}
                                    {{ Form::select('asistencia',array('indeterminado'=>'No Se', 'si'=>'Si','no'=>'No'),'indeterminado',array('onChange'=>'Asistencia()','id'=>'asistencia'))}}

                                    <div class="form-group" >
                                      <label for="inputEmail" class="col-lg-5 control-label">adultos</label>
                                      <div class="col-lg-2">
                                        <input type="text" class="form-control" name="AsistenciaAdultos"  id="AsistenciaAdultos" disabled="true">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="inputPassword" class="col-lg-5 control-label">niños</label>
                                      <div class="col-lg-2">
                                        <input type="text" class="form-control"  name="AsistenciaNiños" id="AsistenciaNiños" disabled="true">
                                      </div>
                                    </div>
                                    <input type="hidden" value="" id="iddelevento" name="iddelevento">
                                    <input type="hidden" value="{{Session::get('usuario_id')}}" name="myuser">

                                    <div class="form-group">
                                      <div class="col-lg-6 col-lg-offset-2">
                                        {{Form::submit('Enviar', array('class' => 'btn btn-default','id'=> 'aceptar','disabled'=>'true'))}}
                                      </div>
                                    </div>
                                </fieldset>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
    @include('includes.footer')
</html>