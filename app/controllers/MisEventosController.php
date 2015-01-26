<?php


class MisEventosController extends BaseController {
	public function index()
	{
		$listaDeEventos=MisEvento::all(); 
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos ));
	}

}