@extends('layouts.default')
<head>
		
		
		
@include('includes.headC')
	
</head>
@section('content')

{{Form::open(array('method' => 'POST', 'action' =>'HomeController@contacto' , 'role' => 'form'))}}



	<div class="form-group">
		{{Form::label('Nombre')}}
		@if(Session::has('usuario_id'))
			{{Form::text('nombre', Usuario::find(Session::get('usuario_id'))->username, array('readonly' => 'readonly', 'class' => 'form-control'))}}
		@else
			{{Form::text('nombre', '', array('class' => 'form-control'))}}
		@endif
		<span class="help-block">{{ $errors->first('nombre') }}</span>
	</div>
	<div class="form-group">
		{{Form::label('Email')}}
		@if(Session::has('usuario_id'))
			{{Form::text('email', Usuario::find(Session::get('usuario_id'))->email, array('readonly' => 'readonly', 'class' => 'form-control'))}}
		@else
			{{Form::text('email', '', array('class' => 'form-control'))}}
		@endif
		<span class="help-block">{{ $errors->first('email') }}</span>
	</div>
	<div class="form-group">
		{{Form::label('Asunto')}}
		{{Form::text('asunto', '', array('class' => 'form-control'))}}
		<span class="help-block">{{ $errors->first('asunto') }}</span>
	</div>
	<div class="form-group">
		{{Form::label('Mensaje')}}
		{{Form::textarea('mensaje', '', array('class' => 'form-control'))}}
		<span class="help-block">{{ $errors->first('mensaje') }}</span>
	</div>
	<div class="form-group">
			{{form::input('hidden','contacto')}}
		<p>{{Form::submit('Enviar', array('class' => 'btn btn-default'))}}</p>
	</div>

	{{Form::close()}}

@stop
	

