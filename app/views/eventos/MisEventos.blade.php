<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Mis Eventos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/StyleComun.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    {{ HTML::script('js/FuncionesDeMisEventos.js') }}

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
                    <tr>
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->direccion}}</td>
                        <td>{{$value->fecha}}</td>
                        <td>{{{$usuarios->username }}}</td> 
                        <td> <button class="btn btn-info" id="{{$value->id}}" onclick="VerEvento(this.id)"><span class="glyphicon glyphicon-eye-open" ></span></button><button class="btn btn-success"  onclick="AsignaIDEvento({{$value->id}})" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-cutlery" ></span></button></td>
                    </tr>
                @endif
                @endforeach
        	   </tbody>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'MisEventosController@asistencia' , 'role' => 'form'))}}
                                <fieldset>
                                    <legend>Acciones</legend>

                                    {{ Form::label('Asistir','Asistir',array('id'=>'','class'=>'')) }}
                                    {{ Form::select('asistencia',array('indeterminado'=>'No Se', 'si'=>'Si','no'=>'No'),'indeterminado',array('onChange'=>'Asistencia()','id'=>'asistencia') )}}

                                    <div class="form-group" >
                                      <label for="inputEmail" class="col-lg-5 control-label">adultos</label>
                                      <div class="col-lg-2">
                                        <input type="text" class="form-control"  id="AsistenciaAdultos" disabled="true">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="inputPassword" class="col-lg-5 control-label">niños</label>
                                      <div class="col-lg-2">
                                        <input type="text" class="form-control"  id="AsistenciaNiños" >
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-6 col-lg-offset-2">
                                        <p>{{Form::submit('Enviar', array('class' => 'btn btn-default'))}}</p>
                                      </div>
                                    </div>
                                    <input type="hidden" value="" id="iddelevento" />
                                </fieldset>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>

    <script >
    function VerEvento(idevento)
    {
        window.location.href="/Evento/"+idevento;
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
    @include('includes.footer')
</html>