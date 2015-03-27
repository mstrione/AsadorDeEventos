<?php


class MisEventosController extends BaseController {
	public function index()
	{
		$listaDeEventos=MisEvento::all(); //asigna a $listaDeEventos todas las filas de la tabla de eventos
		$listaDeInvitados=Invitado::all();
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos,'listaDeInvitados'=>$listaDeInvitados)); //devuelve la vista de MisEventos con el valos 'lista de eventos'

	}
	public function asistencia($id)
	{
		
		return View::make('eventos.MisEventos');
	}

}