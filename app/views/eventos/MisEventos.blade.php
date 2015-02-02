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

</head>
<body>
  	<!--barra de menu-->    
    @include('includes.headersesion')

    <div class="container"> 
    	<div class="well"> 
	        <div><h1 id="type"> Mis Eventos</h1></div>
                <div align="right"><a href="/crearEvento" class="btn btn-primary" >Agregar Evento +</a></div><br>		

    

            <table class='table table-striped table-hover'>
            	<thead>
               	   <th>NOMBRE</th>
            	   <th>LUGAR</th>
            	   <th>FECHA</th>
            	   <th>ORGANIZADOR</th>
            	   <th>ACCIONES</th>
            	</thead>
        	    <tbody>
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
                        <td><span class="glyphicon glyphicon-trash">   </span> <a href="/Evento"><span class="glyphicon glyphicon-eye-open" >   </a></span></td>
                    </tr>
                @endif
                @if ($value->id ==$iddelevento)
                <?php $usuarios=Usuario::find($value->creador)?>
                    <tr>
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->direccion}}</td>
                        <td>{{$value->fecha}}</td>
                        <td>{{{$usuarios->username }}}</td> 
                        <td> <a href="/Evento"><span class="glyphicon glyphicon-eye-open" >   </a></span></td>
                    </tr>
                @endif

                @endforeach


        		 <!-- @foreach ($listaDeEventos as $value )
                  <?php $usuarios=Usuario::find($value->creador)?>
        		  <tr>   
        				<td>{{$value->nombre}}</td>
        				<td>{{$value->direccion}}</td>
        				<td>{{$value->fecha}}</td>
        				<td>{{{$usuarios->username }}}</td> 
        				<td><span class="glyphicon glyphicon-trash">   </span> <a href="/Evento"><span class="glyphicon glyphicon-eye-open" >   </a></span></td>

                        
   	
        		  </tr>
        		  @endforeach--> 
        	   </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
    @include('includes.footer')
</html>