

@extends('layouts.default')

<head>
	@include('includes.headqe')
</head>
<h1 class="featurette-heading" align="center"></h1>
@section('content')
	<div class="page-header">
        <div class="jumbotron">
            <p>Nombre de usuario: {{Session::get('usuario_username')}} </p>
            <p>Email: {{Session::get('usuario_email')}} </p>     
        </div>
    </div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
@stop