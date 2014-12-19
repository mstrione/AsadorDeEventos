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
<div class="page-header">
    <div class="container" id="page">
    <h1>CREAR EVENTO</h1>
    </div>    
</div>
<div class="jumbotron">
{{Form::open(array('method'=>'POST','Action'=> '/MisEventos' ,'role'=>'form','class'=>'form-horizontal'))}}
<fieldset>
			
			
			<div class "row">
				<div class="form-group" >
						{{Form::label('Nombre','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{Form::text('nombre','',array('class'=>'form-control'))}} 
						</div>
				</div>
			</div>
	
	
			<!--FECHA Y HORA-->
			
          
				<div class="row">
				<div class="form-group"  >
					{{Form::label('Fecha','',array('class'=>'col-lg-1 control-label'))}}
					<div class="col-lg-10">
					{{ Form::input('date','Fecha','',array( 'date_format' => 'yyyy-mm-dd')) }}
					<!--Form::text('fecha','',array('class'=>'form-control','class'=>'input-append date','data-date-format'=>'dd-mm-yyyy'))-->
					</div>
					<span class="add-on"><i class="icon-th"></i></span>
				</div>
				</div>
			
			
			<div class "row">
				<div class="form-group"  >
						{{Form::label('Hora','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{ Form::input('time', 'hora','',array( 'time_format' => 'HH:mm:ss')) }}
						<!--Form::text('hora','',array('class'=>'form-control')) -->
						</div>
				</div>
			</div>
			
	
			<div class "row">
				<div class="form-group" >
						{{Form::label('Descripcion','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{Form::textarea('descripcion','',array('class'=>'form-control'))}}
						</div> 
				</div>
			</div>
	
	
			<div class "row">
				<div class="form-group" class="col-lg-4 control-label">
						{{Form::label('Lugar','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{Form::text('direccion','',array('class'=>'form-control'))}} 
						</div>
				</div>
			</div>
			
			<div class "row">
				<div class="form-group" class="col-lg-4 control-label" >
						{{Form::label('Adultos','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{ Form::input('number', 'adultosmax') }}
						</div>
				</div>
			</div>

			<div class "row">
				<div class="form-group" class="col-lg-4 control-label" >
						{{Form::label('Menores','',array('class'=>'col-lg-1 control-label'))}}
						<div class="col-lg-10">
						{{ Form::input('number', 'menoresmax') }}
						</div>
				</div>
			</div>
			
			
	
			<!--ACA INSERTO LO DEL MAPA-->
	<div class="row">
	<dic class='col-lg-10'>
	<div id="panel">
      <input onclick="clearMarkers();" type=button value="ocultar marcadores">
      <input onclick="showMarkers();" type=button value="mostrar marcadores">
      <input onclick="deleteMarkers();" type=button value="borrar marcadores">
    </div>
    </div>
    <div id="map-canvas"></div>
    <p>click en el mapa para agregar marcadores.</p>
			</dic>
			
			
			<div class="form-group" class="col-lg-4 col-lg-offset-2">
				<p>{{Form::submit('Crear Evento', array('class' => 'btn btn-primary'))}}</p>
			</div>
		</fieldset>	
{{Form::close()}}
</div>
	
			<!-- PARTE DE LAS CUENTAS Form::checkbox('name', 'value');-->
		
<h1> CUENTAS </h1>		
	
	
	
	
			<div class=accordion-container>
				<div>
				{{ Form::radio('metodo', '1', (Input::old('metodo') == '1'), array('id'=>'male', 'class'=>'accordion-header'))}}	
				{{Form::label('El organizador invita')}}	
					
				</div>
				
				<div>
				{{Form::radio('metodo', '2', (Input::old('metodo') == '2'), array('id'=>'female', 'class'=>'accordion-header'))}}
				{{Form::label('Se establece un valor fijo')}}				
				</div>
				
				<div>
				{{ Form::radio('metodo', '3', (Input::old('metodo') == '3'), array('id'=>'male', 'class'=>'accordion-header'))}}	
				{{Form::label('Se establece un valor fijo por asistente')}}				
				</div>
				
				<div>
				{{Form::radio('metodo', '4', (Input::old('metodo') == '4'), array('id'=>'female', 'class'=>'accordion-header'))}}
				{{Form::label('Se divide lo gastado en partes iguales')}}				
				</div>
				
				<div>
				{{Form::radio('metodo', '5', (Input::old('metodo') == '5'), array('id'=>'male', 'class'=>'accordion-header'))}}	
				{{Form::label('Se divide lo gastado según asistentes')}}
				
				</div>
				
				<div>
				{{Form::radio('metodo', '6', (Input::old('metodo') == '6'), array('id'=>'female', 'class'=>'accordion-header'))}}
				{{Form::label('Se divide un valor arbitrario en partes iguales')}}				
				</div>
				
				<div>
				{{Form::radio('metodo', '7', (Input::old('metodo') == '7'), array('id'=>'female', 'class'=>'accordion-header'))}}
				{{Form::label('Se divide un valor arbitrario según asistentes')}}				
				</div>
			</div>
	
	
	<!--
	<ul >
		<li class="accordion-container">
		
			<div input type="radio" class="accordion-header" name="" checked="true" value="0">El organizador invita</div>
			<div class="accordion-content"><p>El evento no tiene costo alguno para los invitados</p></div>
		</li>
		<li class="accordion-container">
			<div input type="radio" class="accordion-header" name="" checked="" value="1">Se establece un costo fijo segun asistente</div>
			<div class="accordion-content"><p>Se distinguen dos valores fijos de costo para cada uno de los tipos de asistentes respectivamente, adultos y menores, tambien independientemente del costo total del evento.</p></div>
		</li>
		<li class="accordion-container">
			<div input type="radio" class="accordion-header" name="" checked="" value="2">Se divide lo gastado en partes iguales</div>
			<div class="accordion-content"><p>Se divide el costo total del evento entre todos los asistentes sin distincion alguna.</p></div>
		</li>
		<li class="accordion-container">
			<div input type="radio" class="accordion-header" name="" checked="" value="3">Se divide lo gastado segun asistentes</div>
			<div class="accordion-content"><p>Se establece un valor diferente de costo para cada uno de los tipos de asistentes, adultos y menores, estos valores se calculan a partir del costo total del evento, y un porcentaje de este correspondiente a los asistentes menores, segun se lo indique debajo.</p></div>
		</li>
		<li class="accordion-container">
			<div input type="radio" class="accordion-header" name="" checked="" value="4">Se divide un valor fijo en partes iguales</div>
			<div class="accordion-content"><p>Se divide un valor fijo que representa el costo total, entre todos los asistentes sin distincion alguna.</p></div>
		</li>
		<li class="accordion-container">
			<div input type="radio" class="accordion-header" name="" checked="" value="5">Se divide un valor fijo segun asistente</div>
			<div class="accordion-content"><p>Se establece un valor diferente de costo para cada uno de los tipos de asistentes, adultos y menores, estos valores se calculan a partir de un valor fijo que represental costo total del evento, y el costo correspondiente a los asistentes menores, se calculará como un porcentaje 
									 	 del costo de un asistente adulto, segun se lo indique debajo.</p></div>
		</li>
	</ul>	
			
			
			-->
			
			
			
			<!--PARTE DE LOS INVITADOS-->
			
	<h1>INVITADOS</h1>
	<!--		
	<div class="row">
		<h2 class="inline">Invitados<a id="add-invitee" class="btn btn-success" href="#addInvitee"><i class="icon-plus"></i></a></h2>

		<div class="inline pull-right">
			<label class="inline" for="Events_confirmation_closed">Confirmación Cerrada</label>	
			<input id="ytEvents_confirmation_closed" type="hidden" value="0" name="Events[confirmation_closed]" />
			<input class="inline" name="Events[confirmation_closed]" id="Events_confirmation_closed" value="1" type="checkbox" />
			<div class="errorMessage" id="Events_confirmation_closed_em_" style="display:none"></div>
		</div>		
			
			
			
			
			
			
			
			
			
	<table id="table-invitados" class="table table-striped">
			<thead>
				<tr>
					<th><label for="Invitees_email" class="required">Email <span class="required">*</span></label></th>
					<th><label class="inline" for="Invitees_admin">Organizador</label></th>
					<th><label class="inline" for="Invitees_confirmed">Asistirá</label></th>
					<th><label class="inline" for="Invitees_adults">Adultos</label></th>
					<th><label class="inline" for="Invitees_kids">Niños</label></th>
					<th><label class="inline" for="Invitees_cost">Costo</label></th>
					<th><label class="inline" for="Invitees_spent">Gastó</label></th>
					<th>Balance</th>
					<th><label class="inline" for="Invitees_money_ok">Saldado</label></th>
					<th colspan="2">Acciones</th>
				</tr>
			</thead>
		<tbody>
						
				<tr>
		            <td>
		             <input size="60" maxlength="255" list="suggest" autocomplete="off" name="Invitees[0][email]" id="Invitees_0_email" type="text" />
					 <div class="errorMessage" id="Invitees_email_em_" style="display:none"></div>	
					</td>
		            
					<td>
						<input id="ytInvitees_0_admin" type="hidden" value="0" name="Invitees[0][admin]" />
						<input class="inline" name="Invitees[0][admin]" id="Invitees_0_admin" value="1" type="checkbox" />
						<div class="errorMessage" id="Invitees_admin_em_" style="display:none"></div>
					</td>
		            
					<td>
						<input id="ytInvitees_0_confirmed" type="hidden" value="0" name="Invitees[0][confirmed]" />
						<input class="inline" name="Invitees[0][confirmed]" id="Invitees_0_confirmed" value="1" type="checkbox" />
						<div class="errorMessage" id="Invitees_confirmed_em_" style="display:none"></div>
					</td>
		            
					<td>
						<input class="inline" name="Invitees[0][adults]" id="Invitees_0_adults" type="number" />
						<div class="errorMessage" id="Invitees_adults_em_" style="display:none"></div>
					</td>
		            
					<td>
						<input class="inline" name="Invitees[0][kids]" id="Invitees_0_kids" type="number" />
						<div class="errorMessage" id="Invitees_kids_em_" style="display:none"></div>
					</td>
		            
					<td>
		            	$
						<input class="inline" name="Invitees[0][cost]" id="Invitees_0_cost" type="number" />
						<div class="errorMessage" id="Invitees_cost_em_" style="display:none"></div>
					</td>
		            
					<td>
		            	$
						<input class="inline" name="Invitees[0][spent]" id="Invitees_0_spent" type="number" />	
						<div class="errorMessage" id="Invitees_spent_em_" style="display:none"></div>	
						</td>
					
					<td>
		            	$
						<input disabled="disabled" id="Invitees_time" type="number" value="-1">
					</td>
		            
					<td>
		            	<input id="ytInvitees_0_money_ok" type="hidden" value="0" name="Invitees[0][money_ok]" />
						<input class="inline" name="Invitees[0][money_ok]" id="Invitees_0_money_ok" value="1" type="checkbox" />
						<div class="errorMessage" id="Invitees_money_ok_em_" style="display:none"></div>
					</td>
		            
					<td class="buttons">
		            	<a class="btn btn-default" href="#mailInvitee" title="mail cuentas o invitacion">
		            		<i class="icon-envelope"></i>
		            	</a>
		            </td>
		            
					<td class="buttons">
		            	<a class="btn btn-danger remove-invitee" href="#removeInvitee" title="remove" >
		            		<i class="icon-remove"></i>
		            	</a>
		            </td>
			</tr>
			
        </tbody>
    </table>
	
		<a class="btn btn-info pull-right " href="#resendInvitation" title="Reenviar invitaciones a no confirmados" type="">
		<i class="icon-envelope"></i> Reenviar invitaciones</a>
		<a class="btn btn-info pull-right " href="#sendBills" title="Enviar cuentas a confirmados" type="">
		<i class="icon-envelope"></i> Enviar cuentas</a>
    </div>
        
	<hr>-->
			
			<!-- LISTA DE ITEMS-->
	<!--<h1>ITEMS-LISTA</h1>	
		<div class="row">
		<h2 class="inline">Lista de items <a id="add-item" class="btn btn-success" href="#addItem">	<i class="icon-plus"></i></a>
			
			-->
			<!--FOTOS-->
<!--
			<div class="row fileupload-buttonbar">
	<div class="span7"> -->
		<!-- The fileinput-button span is used to style the file input field as button -->
		<!--<span class="btn btn-success fileinput-button">
            <i class="icon-plus icon-white"></i>
            <span>Elegir Archivos</span>
			<input id="ytXUploadForm_file" type="hidden" value="" name="XUploadForm[file]" /><input multiple="multiple" name="XUploadForm[file]" id="XUploadForm_file" type="file" />
		</span>
        		<button type="submit" class="btn btn-primary start">
			<i class="icon-upload icon-white"></i>
			<span>Iniciar subida</span>
		</button>
		<button type="reset" class="btn btn-warning cancel">
			<i class="icon-ban-circle icon-white"></i>
			<span>Cancelar subida</span>
		</button>
		<button type="button" class="btn btn-danger delete">
			<i class="icon-trash icon-white"></i>
			<span>Eliminar</span>
		</button>
		<input type="checkbox" class="toggle">
        	</div>
	
</div>-->
@stop
