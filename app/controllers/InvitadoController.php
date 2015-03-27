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

		 if(Input::get('opcionNum')=='4')
		 {
		 	$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();		 	
		 	$gasto=0;
		 	$contador=0;
		 	foreach($listaDeInvitados as $usuario)
		 	{
		 		$gasto=$gasto+($usuario->gasto);
		 		$contador=$contador+1;
		 	}
		 	foreach ($listaDeInvitados as $usuario ) 
		 	{
		 		$Musuario = invitado::find($usuario->id);
		 		$Musuario->costo=$gasto/$contador;
		 		$Musuario->save();

		 	}
				$TEvento=Evento::find(Input::get('ideventoN'));
		 		$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 		$gasto=0;
		 		$contador=0;
		 	 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados));
		 }
		 if(Input::get('opcionNum')=='5')
		 {
		 	$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 	$gasto=0;
		 	$contador=0;
		 	$PAdulto=Input::get('adultos5');
		 	$PNiño=Input::get('niños5');
		 	$CantAdultos=0;
		 	$CantNiños=0;
		 	$nulo=0;
		 	foreach($listaDeInvitados as $usuario)
		 	{
		 		$gasto=$gasto+($usuario->gasto);
		 		$contador=$contador+1;
		 		$CantNiños=$CantNiños+$usuario->menores;
		 		$CantAdultos=$CantAdultos+$usuario->adultos;
		 	}

		 	if($CantAdultos!=0)
		 	{
		 		$GastoPorAdulto=$gasto*$PAdulto/100;
		 		$GastoPorAdulto=round($GastoPorAdulto/$CantAdultos);
		 	}
		 	else
		 	{
		 		$GastoPorAdulto=0;
		 	}
		 	
		 	if($CantNiños!=$nulo)
		 	{

		 		$GastoPorNiño=$gasto*$PNiño/100;
		 		$GastoPorNiño=round($GastoPorNiño/$CantNiños);
		 	}else
		 	{
		 		$GastoPorNiño=0;
		 	}

		 	foreach($listaDeInvitados as $usuario)
			{
				$Musuario = invitado::find($usuario->id);
				//$Musuario->costo=(($usuario->adultos)*$valor)+(($usuario->menores)*$valor);
				$Musuario->costo=(($usuario->adultos)*$GastoPorAdulto)+(($usuario->menores)*$GastoPorNiño);
				$Musuario-> save();
			}
				$TEvento=Evento::find(Input::get('ideventoN'));
		 		$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 	 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados));
		 }
		 if(Input::get('opcionNum')=='6')
		 {
		 	$valor=Input::get('valor');
		 	$costo=0;
		 	$contador=0;
		 	$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 	foreach ($listaDeInvitados as $usuario)
		 	{
		 		$contador=$contador+1;
		 	}
		 	if ($contador!=0)
		 	{
		 		$costo=round($valor/$contador);
		 	}
		 	foreach ($listaDeInvitados as $usuario) 
		 	{
		 		$Musuario = invitado::find($usuario->id);
		 		$Musuario->costo=$costo;		 		
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
