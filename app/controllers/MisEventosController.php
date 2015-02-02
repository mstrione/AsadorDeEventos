<?php


class MisEventosController extends BaseController {
	public function index()
	{
		$listaDeEventos=MisEvento::all(); //asigna a $listaDeEventos todas las filas de la tabla de eventos
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos)); //devuelve la vista de MisEventos con el valos 'lista de eventos'
	}

}