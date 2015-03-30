@extends('layouts.default')
<head>
	@include('includes.headC')
	{{ HTML::script('js/vallenato.js') }}
	{{ HTML::style('css/vallenato.css') }}
	{{ HTML::script('js/datepicker.js') }}
	{{ HTML::script('js/MapaCrearEvento.js') }}
	{{ HTML::style('css/datepicker.css') }}
	{{ HTML::style('css/EstiloMapa.css') }}
	
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script >google.maps.event.addDomListener(window, 'load', initialize);	
	</script>
</head>
	@section('content')
	<?php $Tevento=Evento::find($idevento);?> 
@if((Session::get('usuario_id')==$Tevento->creador ))
		<div class="page-header">
		    <div class="container" id="page">
		    	<h1>Editar Evento</h1>
		    </div>    
		</div>
		<?php $EventoAModificar=Evento::find($idevento);?>
		<div class="jumbotron">
			{{Form::open(array('method' => 'POST', 'class'=>'form-horizontal', 'action' =>'EventoController@editando' , 'role' => 'form'))}}
			<fieldset>
			<div class "row">
				<div class="form-group" >
					{{Form::label('Nombre','',array('class'=>'col-lg-1 control-label'))}}
					<div class="col-lg-10">
						{{Form::text('nombre',$EventoAModificar->nombre,array('class'=>'form-control'))}} 
					</div>
				</div>
			</div>	
			<!--FECHA Y HORA-->
			
          
			<div class="row">
			<div class="form-group"  >
				{{Form::label('Fecha','',array('class'=>'col-lg-1 control-label'))}}
				<div class="col-lg-10">
				{{ Form::input('date','Fecha',$EventoAModificar->fecha,array( 'date_format' => 'yyyy-mm-dd')) }}
				<!--Form::text('fecha','',array('class'=>'form-control','class'=>'input-append date','data-date-format'=>'dd-mm-yyyy'))-->
				</div>
				<span class="add-on"><i class="icon-th"></i></span>
			</div>
			</div>
			
			
			<div class "row">
				<div class="form-group"  >
						{{Form::label('Hora','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{ Form::input('time', 'hora',$EventoAModificar->hora,array( 'time_format' => 'HH:mm:ss')) }}
						<!--Form::text('hora','',array('class'=>'form-control')) -->
						</div>
				</div>
			</div>
			
	
			<div class "row">
				<div class="form-group" >
						{{Form::label('Descripcion','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{Form::textarea('descripcion',$EventoAModificar->descripcion,array('class'=>'form-control'))}}
						</div> 
				</div>
			</div>
	
	
			<div class "row">
				<div class="form-group" class="col-lg-4 control-label">
						{{Form::label('Lugar','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{Form::text('direccion',$EventoAModificar->direccion,array('class'=>'form-control'))}} 
						</div>
				</div>
			</div>
			
			<div class "row">
				<div class="form-group" class="col-lg-4 control-label" >
						{{Form::label('Adultos','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{ Form::input('number', 'adultosmax',$EventoAModificar->adultosmax) }}
						</div>
				</div>
			</div>

			<div class "row">
				<div class="form-group" class="col-lg-4 control-label" >
						{{Form::label('Menores','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{ Form::input('number', 'menoresmax',$EventoAModificar->menoresmax) }}
						</div>
				</div>
			</div>
			
			
	
			<!--ACA INSERTO EL MAPA-->
	<div class="row">
	<dic class='col-lg-12'>
	<div id="panel">
      <input onclick="deleteMarkers();" type=button value="borrar marcadores">
    </div>
    </div>
    <div id="map-canvas"></div>
    <p>click en el mapa para agregar marcadores.</p>

	<div class="form-group" class="col-lg-1 control-label">
		{{Form::text('Latitud',$EventoAModificar->latitud,array('class'=>'form-control', 'id'=>'Latitud','TYPE'=>'text' ,'style'=>"display: none" ))}}
		{{Form::text('Longitud',$EventoAModificar->longitud,array('class'=>'form-control', 'id'=>'Longitud','TYPE'=>'text' ,'style'=>"display: none" ))}}
		{{Form::input('hidden','ideventoN',$idevento)}}
	</div>
			<div class="form-group" class="col-lg-4 col-lg-offset-2">
				<p>{{Form::submit('Editar Evento', array('class' => 'btn btn-primary'))}}</p>
			</div>
		</fieldset>	
{{Form::close()}}
</div>
@endif
@stop
