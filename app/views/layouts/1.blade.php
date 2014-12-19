<!doctype html>
<html>

<body>
<div class="container">

	<header class="row">
		//@include('includes.headL')
		
		@if(!Session::has('usuario_id'))
		
				@include('includes.header')
			@else
				<p>¡Hola {{Session::get('usuario_username')}}!</p>
				@include('includes.headersesion')
		@endif
		
	</header>

	<div class="container-full">

		<div class="row">
			<div class="col-lg-7 col-lg-offset-3" style="margin-bottom:50px;">
				
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-lg-5 col-lg-offset-3">
				@yield('content')
			</div>			
		</div>
		

		<div class="row">
			<div class="col-lg-7 col-lg-offset-3">
				<footer>
					
				</footer>
			</div>
		</div>

	</div>

	<footer class="row">
		@include('includes.footer')
	</footer>
	<!-- JS -->
	<script src="{{ URL::asset('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</div>
</body>
</html>