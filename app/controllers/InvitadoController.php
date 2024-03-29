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

	 public function invitar()
	{	
		$idevento=Input::get('ideventoN');
		$evento=Evento::find($idevento);
	 	 $msj =null;
	 	 $usuario=Usuario::find($evento->creador);
	 	 $data= array(
	 	 	'nombre' => Input::get('nombre'),
	 	 	'email' => Input::get('email'),
	 	 	'creador'=>$usuario->username
	 	 	);
	 	 $FromEmail = 'admin@asadordeeventos.890m.com';
	 	 $FromName = 'administrador';
	 	 $toName=Input::get('nombre');
	 	 $toEmail=Input::get('email');

	 	 
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
	 	Mail::send('emails.invitado', $data, function($mensaje) use ($FromEmail,$FromName,$toEmail,$toName)
	 	 {
	 	 	$mensaje->to($toEmail,$toName);
	 	 	$mensaje->from($FromEmail,$FromName);
	 	 	$mensaje->subject('Nuevo Mail de Contacto');
	 	 });
	 	
		return Redirect::to("/Evento/$idevento");
	}
	public function cuenta()
	{
		if(Input::get('opcionNum')=='1')
		{
			$balance=0;
			$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('ideventoN'))->where('confirmado','=','1')->get();
			foreach($listaDeInvitadosA as $usuario)
			{
				$Musuario = invitado::find($usuario->id);
				//$Musuario->costo=(($usuario->adultos)*$valor)+(($usuario->menores)*$valor);
				$Musuario->costo=0;
				$Musuario->balance=($Musuario->costo)-($usuario->gasto);
				$Musuario-> save();
			}
				$idevento=Input::get('ideventoN');
		return Redirect::to("/Evento/$idevento");
		}	
		
		 if(Input::get('opcionNum')=='2')
		 {
		 	$balance=0;
		 	$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('ideventoN'))->where('confirmado','=','1')->get();
		 	$valor=Input::get('valor');
		 	foreach($listaDeInvitadosA as $usuario)
		 	{
		 		$Musuario = invitado::find($usuario->id);
		 		//$Musuario->costo=(($usuario->adultos)*$valor)+(($usuario->menores)*$valor);
		 		$Musuario->costo=$valor;
		 		$Musuario->balance=($Musuario->costo)-($usuario->gasto);
		 		$Musuario -> save();
		 	}
				$idevento=Input::get('ideventoN');
		return Redirect::to("/Evento/$idevento");
		 }

		 if(Input::get('opcionNum')=='3')
		 {
		 	$balance=0;
		 	$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('ideventoN'))->where('confirmado','=','1')->get();
		 	$valor=Input::get('valor');
		 	foreach($listaDeInvitadosA as $usuario)
		 	{
		 		$Musuario = invitado::find($usuario->id);
		 		$Musuario->costo=(($usuario->adultos)*Input::get('adultos'))+(($usuario->menores)*Input::get('niños'));
		 		$Musuario->balance=($Musuario->costo)-($usuario->gasto);
		 		$Musuario -> save();
		 	}
				$idevento=Input::get('ideventoN');
				return Redirect::to("/Evento/$idevento");
		 }

		 if(Input::get('opcionNum')=='4')
		 {
		 	$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('ideventoN'))->where('confirmado','=','1')->get();		 	
		 	$gasto=0;
		 	$contador=0;
		 	$balance=0;
		 	foreach($listaDeInvitadosA as $usuario)
		 	{
		 		$gasto=$gasto+($usuario->gasto);
		 		$contador=$contador+1;
		 	}
		 	foreach ($listaDeInvitadosA as $usuario ) 
		 	{
		 		$Musuario = invitado::find($usuario->id);
		 		$Musuario->costo=$gasto/$contador;
		 		$Musuario->balance=($Musuario->costo)-($usuario->gasto);
		 		$Musuario->save();

		 	}
				
		 		$gasto=0;
		 		$contador=0;
		 	 $idevento=Input::get('ideventoN');
		return Redirect::to("/Evento/$idevento");
		 }
		 if(Input::get('opcionNum')=='5')
		 {
		 	$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('ideventoN'))->where('confirmado','=','1')->get();
		 	$gasto=0;
		 	$contador=0;
		 	$PAdulto=Input::get('adultos5');
		 	$PNiño=Input::get('niños5');
		 	$CantAdultos=0;
		 	$CantNiños=0;
		 	foreach($listaDeInvitadosA as $usuario)
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
		 	
		 	if($CantNiños!=0)
		 	{

		 		$GastoPorNiño=$gasto*$PNiño/100;
		 		$GastoPorNiño=round($GastoPorNiño/$CantNiños);
		 	}else
		 	{
		 		$GastoPorNiño=0;
		 	}

		 	foreach($listaDeInvitadosA as $usuario)
			{
				$Musuario = invitado::find($usuario->id);
				//$Musuario->costo=(($usuario->adultos)*$valor)+(($usuario->menores)*$valor);
				$Musuario->costo=(($usuario->adultos)*$GastoPorAdulto)+(($usuario->menores)*$GastoPorNiño);
				$Musuario->balance=($Musuario->costo)-($usuario->gasto);
				$Musuario-> save();
			}
				//$TEvento=Evento::find(Input::get('ideventoN'));
		 		//$listaDeInvitados=Invitado::where('idevento','=',Input::get('ideventoN'))->get();
		 	 //return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados));
			$idevento=Input::get('ideventoN');
			return Redirect::to("/Evento/$idevento");
		 }
		 if(Input::get('opcionNum')=='6')
		 {
		 	$valor=Input::get('valor');
		 	$costo=0;
		 	$contador=0;
		 	$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('ideventoN'))->where('confirmado','=','1')->get();;
		 	foreach ($listaDeInvitadosA as $usuario)
		 	{
		 		$contador=$contador+1;
		 	}
		 	if ($contador!=0)
		 	{
		 		$costo=round($valor/$contador);
		 	}
		 	foreach ($listaDeInvitadosA as $usuario) 
		 	{
		 		$Musuario = invitado::find($usuario->id);
		 		$Musuario->costo=$costo;
		 		$Musuario->balance=($Musuario->costo)-($usuario->gasto);		 		
		 		$Musuario -> save();
		 	}
		 	$idevento=Input::get('ideventoN');
		return Redirect::to("/Evento/$idevento");
		 }
		 if(Input::get('opcionNum')==7)
		 {
		 	$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('ideventoN'))->where('confirmado','=','1')->get();
		 	$valor=Input::get('valor');
		 	$PAdulto=Input::get('adultos7');
		 	$PNiño=Input::get('niños7');
		 	$CantNiños=0;
		 	$CantAdultos=0;
		 	$GastoPorAdulto=0;
		 	$GastoPorNiño=0;

		 	foreach($listaDeInvitadosA as $usuario)
		 	{
		 		$CantNiños=$CantNiños+$usuario->menores;
		 		$CantAdultos=$CantAdultos+$usuario->adultos;
		 	}

		 	if($CantAdultos!=0)
		 	{
		 		$GastoPorAdulto=$valor*$PAdulto/100;
		 		$GastoPorAdulto=round($GastoPorAdulto/$CantAdultos);
		 	}
		 	else
		 	{
		 		$GastoPorAdulto=0;
		 	}
		 	
		 	if($CantNiños!=0)
		 	{

		 		$GastoPorNiño=$valor*$PNiño/100;
		 		$GastoPorNiño=round($GastoPorNiño/$CantNiños);
		 	}else
		 	{
		 		$GastoPorNiño=0;
		 	}

		 	foreach($listaDeInvitadosA as $usuario)
			{
				$Musuario = invitado::find($usuario->id);
				//$Musuario->costo=(($usuario->adultos)*$valor)+(($usuario->menores)*$valor);
				$Musuario->costo=(($usuario->adultos)*$GastoPorAdulto)+(($usuario->menores)*$GastoPorNiño);
				$Musuario->balance=($Musuario->costo)-($usuario->gasto);
				$Musuario-> save();
			}
				$idevento=Input::get('ideventoN');
				return Redirect::to("/Evento/$idevento");

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
