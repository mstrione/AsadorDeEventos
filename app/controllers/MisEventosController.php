<?php


class MisEventosController extends BaseController {
	public function index()
	{
		$listaDeEventos=MisEventos::all(); 
		return View::make('eventos.MisEventos',array('listaDeEventos'=>$listaDeEventos ));
	}

}