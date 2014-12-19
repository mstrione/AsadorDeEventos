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
			'email' => 'required|email|unique',
			'password' => 'required|min:4|max:10',
			'verificacion'=>'same:password',
			'ciudad'=>'required',
			'provincia'=>'required',
			'nacimiento'=>'required'
			
			);
			
			 $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute debe ser un email válido.',
            'unique' => 'El email ingresado ya existe en la base de datos'
        );
			
			$validator = Validator::make ($input, $rules,$messages); 
			
			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator)-> with('estado', 'Revise los datos ingresados') ;
				
			}
			else
			{ 
			
				$Usuario = new usuarios;
				$Usuario->username = Input::get('username');
				$Usuario->apellido =Input::get('apellido');
				$Usuario->ciudad = Input::get('ciudad');
				$Usuario->email = Input::get('email');;
				$Usario->nacimiento = Input::get('nacimiento');
				$Usuario->password = Input::get('password');
				$Usuario->provincia = Input::get('provincia');
				$Usuario->sexo = Input::get('sexo');;
				$Usuario->verificacion = Input::get('verificacion');;
				$Usuario->save();
			return Redirect::to('/registro')->with('registro', 'Registro completado. Accede a su cuenta');
			
				
					
			}
	}
	
	
	
	
		
	
		
}