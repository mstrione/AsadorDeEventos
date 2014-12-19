@extends('layouts.default')
<head>
	@include('includes.headPopItem')
</head>
@section('content')
<!--{{Form::open(array('method'=>'POST','url'=>'/contacto','role'=>'form'))}} -->
		<a data-toggle="modal" href="app/views/pages" class="btn btn-primary btn-large"> <!-- en href deberia ponerse la direccion donde se encuentra el popup, en este caso es id=example-->
		Agregar Invitado
		</a>
  	
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <bold><h2>AGREGAR INVITADO</h2></bold>
         </div>
         
		 <form >
		<!--Nombre-->
                  <div class="form-group">
                      <label for="inputNombre" class="col-lg-2 control-label">Nombre</label>
                      <input class="form-control" id="inputNombre" placeholder="Nombre" type="text" name="nombre">                    
                  </div>
				  
				  <!--Apellido-->
				  <div class="form-group">
                      <label for="inputApellido" class="col-lg-2 control-label">Apellido</label>
                      <input class="form-control" id="inputNombre" placeholder="Apellido" type="text" name="apellido">                                           
                  </div>
                                   
                <!--Mail-->
                  
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <input class="form-control" id="inputEmail" placeholder="Email del invitado" type="email" name="mail">                   
                </div>
				
				<!---->
                <div class="form-group">
					<label class="col-lg-2 control-label">ROL:</label>
						<div class="col-xs-2">
						<label class="radio-inline">
							<input type="radio" name="rol" value="invitado" checked="checked">Invitado</label>
						</div>
				<div class="col-xs-2">
					<label class="radio-inline">
					<input type="radio" name="rol" value="creador">Organizador</label>
            	</div>
          
                
		</form>
         <div class="modal-footer">
            <a href="#" class="btn btn-success" action="ValidarCantidad">Invitar</a>
            <a href="#" data-dismiss="modal" class="btn">Cancelar</a>
         </div>
   	</div>
   </div>
</div>
<!--{{Form::close()}}-->
	
@stop
