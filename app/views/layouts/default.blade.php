<!doctype html>
<html>

<body>
<div class="container">

	<header class="row">
		@if(Session::has('estado'))
		<h3>{{Session::get('estado')}}</h3></br>
	@endif
	@if(Session::has('usuario_id'))
		@include('includes.headersesion')
	@else
		@include('includes.header')
	@endif		
	</header>
	
	<div id="main" class="row">

			@yield('content')

	</div>

	<footer class="row">
		@include('includes.footer')
	</footer>

</div>
</body>
</html>