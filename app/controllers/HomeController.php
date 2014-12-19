<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	//RUTA DE LA PAGINA PRINCIPAL	
	public function showPrincipal()
	{
		return View::make('home');
	}

	//RUTA DE ACERCA DE MEATING
	public function showAbout()
	{
		return View::make('about');
	}
	
	//RUTA DE ACERCA DE NOSOTROS
	public function showAboutUs()
	{
		return View::make('aboutUs');
	}
	
	
	
	//---------------PARTE DEL CONTACTO------------------------------------------------------------------------
	
	public function get_contacto()
	{
		return View::make('contacto');
	}
	
	public function post_contacto()
	{
		$input = Input::all();
		$rules = array(
			'nombre' => 'required',
			'email' => 'required|email',
			'mensaje' => 'required',
		);
		$validator = Validator::make($input, $rules); //aca se compara el input con las reglas
		if($validator->fails()) //si la validacion falla
		{
			return Redirect::back()->withErrors($validator)->with('estado', 'No enviado. Comprueba los datos que has ingresado');
		}
		else
		{
			$datos = array(
				'nombre' => Input::get('nombre'),
				'email' => Input::get('email'),
				'asunto' => Input::get('asunto'),
				'mensaje' => Input::get('mensaje')
			);
			Mail::send('emails.contact', $datos, function($message) //se envia el mail
			{
			    $message->from('meating@web.com', 'Laravel');
			    $message->to(Input::get('email'))->subject(Input::get('asunto'));
			});
			return Redirect::to('/contacto')->with('estado', 'Mensaje enviado correctamente');
		}
	}
	
	
}
