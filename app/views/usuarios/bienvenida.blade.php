@extends('layouts.1')

@section('content')

	<h1>BIENVENID@</h1>

	<p>Buenasss {{Session::get('usuario_username')}}</p>
	<p><a href="/MisEventos">mis eventos</a></p>
	<p><a href="/logout">¿Salir?</a></p>

@stop