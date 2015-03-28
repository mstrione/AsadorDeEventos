<?php


class MisEventosController extends BaseController {
	public function index()
	{
		$listaDeEventos=MisEvento::all(); //asigna a $listaDeEventos todas las filas de la tabla de eventos
		$listaDeInvitados=Invitado::all();
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos,'listaDeInvitados'=>$listaDeInvitados)); //devuelve la vista de MisEventos con el valos 'lista de eventos'

	}
	public function asistencia()
	{
		$desicion=Input::get('asistencia');
		$iduser=Input::get('myuser');
		$CAdultos=Input::get('AsistenciaAdultos');
		$Cniños=Input::get('AsistenciaNiños');
		 if($desicion=='si')
		 {
			$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('iddelevento'))->where('idusuario','=',$iduser)->get();
			foreach ($listaDeInvitadosA as $usuario) 
			{
				$Musuario = invitado::find($usuario->id);
				$Musuario->confirmado=1;
				$Musuario->menores=$Cniños;
				$Musuario->adultos=$CAdultos;
				$Musuario->save();
			}
			$listaDeEventos=MisEvento::all(); //asigna a $listaDeEventos todas las filas de la tabla de eventos
		$listaDeInvitados=Invitado::all();
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos,'listaDeInvitados'=>$listaDeInvitados));
		}

		if($desicion=='no')
		{
			$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('iddelevento'))->where('idusuario','=',$iduser)->get();
			foreach ($listaDeInvitadosA as $usuario)  
			{
				$Musuario = invitado::find($usuario->id);
				$Musuario->confirmado=2;
				$Musuario->save();
			}
			$listaDeEventos=MisEvento::all(); //asigna a $listaDeEventos todas las filas de la tabla de eventos
		$listaDeInvitados=Invitado::all();
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos,'listaDeInvitados'=>$listaDeInvitados));
		}

		if($desicion=="indeterminado")
		{
			$listaDeInvitadosA=Invitado::where('idevento','=',Input::get('iddelevento'))->where('idusuario','=',$iduser)->get();
			foreach ($listaDeInvitadosA as $usuario) 
			{
				$Musuario = invitado::find($usuario->id);
				$Musuario->confirmado=0;
				$Musuario->save();
			}
			$listaDeEventos=MisEvento::all(); //asigna a $listaDeEventos todas las filas de la tabla de eventos
		$listaDeInvitados=Invitado::all();
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos,'listaDeInvitados'=>$listaDeInvitados));
		}
		
	}

	public function gastos()
	{
		$iduser=Input::get('myuser');
		$MisGastos=Input::get('MisGastos');
		$listaDeInvitados=Invitado::where('idevento','=',Input::get('iddelevento'))->where('idusuario','=',$iduser)->get();
		foreach ($listaDeInvitados as $usuario) 
			{
				$Musuario = invitado::find($usuario->id);
				$Musuario->gasto=$MisGastos;
				$Musuario->save();
			}
		$listaDeEventos=MisEvento::all(); //asigna a $listaDeEventos todas las filas de la tabla de eventos
		$listaDeInvitados=Invitado::all();
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos,'listaDeInvitados'=>$listaDeInvitados));

	}

}