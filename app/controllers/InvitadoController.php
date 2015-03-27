<?php

class InvitadoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function invitar($idevento=null)
	{
		 $msj =null;
		 $data= array(
		 	'nombre' => Input::get('nombre'),
		 	'email' => Input::get('email')
		 	);
		 $FromEmail = 'asadordeeventos@gmail.com';
		 $FromName = 'administrador';

		 Mail::send('emails.invitado', $data, function($mensaje) use ($FromEmail,$FromName)
		 {
		 	$mensaje->to($FromEmail,$FromName);
		 	$mensaje->from($FromEmail,$FromName);
		 	$mensaje->subject('Nuevo Mail de Contacto');
		 });
		$email=Input::get('email');
		$listaDeusuarios=Usuario::where('email','=',$email)->get();
		foreach ($listaDeusuarios as $usuario ) {
			$Ninvitado = new Invitado;
			$Ninvitado->idevento= Input::get('ideventoN');
			$Ninvitado->idusuario=$usuario->id;
			$Ninvitado->email= $usuario->email;
			$Ninvitado->rol=1 ; //rol del invitado
			$Ninvitado->save();
		}
		
			$TEvento=Evento::find(Input::get('ideventoN'));
		$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados));


	}
	public function cuenta($id=null)
	{
		if(Input::get('opcionNum')=='1')
		{
			$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
			foreach($listaDeInvitados as $usuario)
			{
				$Musuario = invitado::find($usuario->id);
				//$Musuario->costo=(($usuario->adultos)*$valor)+(($usuario->menores)*$valor);
				$Musuario->costo=0;
				$Musuario-> save();
			}
				$TEvento=Evento::find(Input::get('ideventoN'));
				$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
			 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados));
		}	
		
		 if(Input::get('opcionNum')=='2')
		 {
		 	$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 	$valor=Input::get('valor');
		 	foreach($listaDeInvitados as $usuario)
		 	{
		 		$Musuario = invitado::find($usuario->id);
		 		//$Musuario->costo=(($usuario->adultos)*$valor)+(($usuario->menores)*$valor);
		 		$Musuario->costo=$valor;
		 		$Musuario -> save();
		 	}
				$TEvento=Evento::find(Input::get('ideventoN'));
		 		$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 	 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados));
		 }

		 if(Input::get('opcionNum')=='3')
		 {
		 	$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 	$valor=Input::get('valor');
		 	foreach($listaDeInvitados as $usuario)
		 	{
		 		$Musuario = invitado::find($usuario->id);
		 		$Musuario->costo=(($usuario->adultos)*Input::get('adultos'))+(($usuario->menores)*Input::get('niños'));
		 		
		 		$Musuario -> save();
		 	}
				$TEvento=Evento::find(Input::get('ideventoN'));
		 		$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 	 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados));
		 }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
