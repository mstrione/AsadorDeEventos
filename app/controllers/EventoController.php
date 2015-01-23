<?php

class EventoController extends BaseController {

	  
	 public function get_crearEvento()
	{
		return View::make('pages.crearEvento');
	}

	public function get_EventoX()
	{
		if ($_POST)
		{	
			$NEvento= new Evento;
			$NEvento -> nombre=Input::get('nombre');
			$NEvento -> fecha=Input::get('Fecha');
			$NEvento -> hora=Input::get('hora');
			$NEvento -> descripcion=Input::get('descripcion');
			$NEvento -> latitud=Input::get('nombre');
			$NEvento -> longitud=Input::get('nombre');
			$NEvento -> adultosmax=Input::get('adultosmax');
			$NEvento -> menoresmax=Input::get('menoresmax');
			$NEvento -> metodocuenta=Input::get('menoresmax');
			$NEvento -> creador=Input::get('nombre');
			$NEvento-> save();
			//return View::make('eventos.MisEventos');
			return Redirect::action('MisEventosController@index');
		}
		else
		{
			return View::make('pages.crearEvento');
		}
	}
	
	public function post_crearEvento()
	{
		$input= Input::all();
		//En rules ponemos que cosas vamos a validar... con lo que trae laravel quedaria:
		$rules=array(
			'nombre' => 'required',
			'direccion' => 'required',
			'fecha'=> 'date_format:d/m/y',
			'hora' => 'required'|'time',
			'descripcion'=>'required',
			'adultosmax'=>'required'|'numeric',
			'menoresmax'=>'required'|'numeric',
		);
			
		$validator = Validator::make ($input, $rules); 
		
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)-> with('estado', 'Revise los datos ingresados') ;
			
		}
		else
		{ 
		
			$Evento = new eventos;
			$Evento->nombre = Input::get('username');
			$Evento->direccion =Input::get('apellido');
			$Evento->descripcion = Input::get('ciudad');
			$Evento->fecha = Input::get('email');;
			$Evento->hora = Input::get('nacimiento');
			$Evento->adultosmax = Input::get('password');
			$Evento->menoresmax = Input::get('provincia');				
			$Evento->save();
			return Redirect::to('crearEvento')->with('crearEvento', 'Su evento ha sido creado');
		}
			
	}
	 
	public function crearEvento()
	{
		/*
		$respuesta = Evento::agregarEvento(Input::all());
		if ($respuesta['error']==true)
		{
			return Redirect::to('crearEvento')->withErrors($respuesta['mensaje'])->withInput;			
		}else {
			return Redirect::to('evento')->with('mensaje', $respuesta['mensaje']);
			}*/
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
	public function mostrarEventos($id)
	{
		/*
		$eventos=Evento::all(); // o mostrar el evento pasado por id
		$usuarios=Usuario::all;
		$items=Item::all;
		$fotos=Foto::all;
		$invitados=Invitado::all;
		//falta poner el chat e items ok!*/
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
