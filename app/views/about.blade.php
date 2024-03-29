

@extends('layouts.default')

<head>
	@include('includes.headqe')
</head>
<h1 class="featurette-heading" align="center">¿Qué es Asador De Eventos?</h1>
@section('content')
	<div class="page-header">
    <div class="jumbotron">
 
        <p>Asador de eventos surge como un proyecto realizado para una Materia universitaria.</p>
        <p>AdE es la derivación de un proyecto grupal anterior , llamado en su tiempo MEating el cual se vio forzado a ser abandonado por diferentes motivos entre los miembros del grupo; Dando paso a la creación de AdE</p>
        <div class="row">
            <div class="span6 screenshotHolder">
                <img src="/img/posicion.jpg" class="img-thumbnail" alt="Thumbnail Image">
                <div class="span4 pull-right description">
                    <h2 class="featurette-heading">Crear eventos</h2>
                    <p class="lead ">Con AdE podras crear los mejores eventos en el menor tiempo.</p>
                    <p class="lead ">Con la ayuda de Google Maps, tus invitados no van a tener excusa para perderse.</p>
                </div>
            </div>
        </div>
        </hr>
        <div class="row">
            <div class="span6 pull-right screenshotHolder">
                <img src="/img/eventos.jpg" class="img-thumbnail" alt="Thumbnail Image">
            </div>
            <div class="span4 description">
                <h2 class="featurette-heading">Ver eventos</h2>
                <p class="lead ">Tendras una vision rapida de tus eventos.</p>
            </div>
        </div>
        </hr>
    </hr></br>
        <div class="row">
            <div class="span6 pull-left screenshotHolder">
                <img src="img/compras.jpg" class="img-thumbnail" alt="Thumbnail Image">
            </div>
            <div class="span4 description">
                <h2 class="featurette-heading">Y quien compra todo???</h2>
                <p class="lead ">No te preocupes, tras la asignacion de cantidad de personas, nuestro sistema se encarga automaticamente de recabar toda la informacion dandote varias opciones para que cada uno ponga lo mejor de sí.</p>
            </div>
        </div>
        </div>
      </hr>
     
</div>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
@stop