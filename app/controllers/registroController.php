<?php

class registroController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome'); aca seria ContactoController en el route
	|
	*/
	public function get_registro()
	{
		return View::make('pages.registro');
	} 
	
	public function post_registro()
	{
		$input= Input::all();
		$rules=array(
			'username' => 'required|min:3|max:10',
			'apellido'=>'required|min:3|max:10',
			'email' => 'required|email|unique:usuarios,email',
			'password' => 'required|min:3|max:10',
			'nacimiento'=>'required',
			'verificacion'=>'same:password',
			'provincias'=>'required',
			'ciudad'=>'required'			
		);
			
		$validator = Validator::make ($input, $rules); 
			
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)-> with('estado', 'Revise los datos ingresados');				
		}
		else
		{ 
			if ($_POST)
			{
				$Usuario= new Usuario;
				$Usuario -> username = Input::get('username');
				$Usuario -> apellido =Input::get('apellido');
				$Usuario -> ciudad = Input::get('ciudad');
				$Usuario -> email = Input::get('email');
				$Usuario -> nacimiento = Input::get('nacimiento');
				$Usuario -> password = Input::get('password');
				$Usuario -> provincia = Input::get('provincias');
				$Usuario -> sexo = Input::get('sexo');
				$Usuario->save();
				return Redirect::action('UsuarioController@get_login');
				//return Redirect::to('/registro')->with('registro', 'Registro completado. Accede a su cuenta');	
			}
			else
			{
				return Redirect::back();
			}		
		}
	}
}