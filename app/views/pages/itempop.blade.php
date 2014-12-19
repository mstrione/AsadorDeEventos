@extends('layouts.default')
<head>
	@include('includes.headPopItem')
</head>
@section('content')
<!--{{Form::open(array('method'=>'POST','url'=>'/itempop','role'=>'form'))}} -->
		<a data-toggle="modal" href="app/views/pages" class="btn btn-primary btn-large"> <!-- en href deberia ponerse la direccion donde se encuentra el popup, en este caso es id=example-->
		Agregar Item
		</a>
  	<!--Lo de arriba es el boton que deberia ir en la pagina del evento para poder agregar el item
	LUEGO, el codigo que sigue, estaria en otra pagina para que salte como popup.-->
	<!--<div id="itempop" class="modal fade">-->
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <bold><h2>AGREGAR ITEM</h2></bold>
         </div>
         
                        
         
	{{Form::open(array('method' => 'POST', 'url' => '/itempop', 'role' => 'form'))}}

		<div class "row">
			<div class="col-xs-6">
				<div class="input-group" >
						{{Form::label('Nombre del Item')}}
						{{Form::text('nombre','',array('class'=>'form-control'))}} 
				</div>
			</div>
		</div>
			
			
		<div class "row">
			<div class="col-xs-6">
				<div class="input-group" >
						{{Form::label('Cantidad')}}
						{{Form::input('number','cantidad')}} 
				</div>
			</div>
		</div>
		</br>
		 
         <div class="modal-footer">
			<div class="form-group" class="col-lg-4 col-lg-offset-2">
				<p>{{Form::submit('Agegar Item', array('class' => 'btn btn-success'))}}</p>
				<p>{{Form::submit('Cancelar', array('class' => 'btn btn-primary') )}}</p>
			</div>            
         </div>
	
   	</div>
   </div>
</div>
{{Form::close()}}
	
@stop
