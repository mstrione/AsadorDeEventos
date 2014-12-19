<?php

class FotoController extends \BaseController {




	
	public function get_foto()
	{
		return View::make("pages.Evento");
	}

	
	public function post_foto()
	{
		$file = Input::file("photo");
		$dataUpload = array(
        "titulo"    =>    Input::get("titulo"),        
        "photo"        => $file//campo foto para validar
    );
    
    $rules = array(
        'titulo'  => 'required',        
        'photo'     => 'required'
    );
	
	$messages = array(
        'required'  => 'El campo :attribute es obligatorio.',
        
    );
	
	$validation = Validator::make(Input::all(), $rules, $messages);
         //si la validación falla redirigimos al formulario de registro con los errores
        //y con los campos que nos habia llenado el usuario    
    if ($validation->fails())
    {
        return Redirect::to('upload')->withErrors($validation)->withInput();
    }else{
        $foto = new Foto(array(
            "titulo"    =>    Input::get("titulo"),            
            "photo"        =>    Input::file("photo")->getClientOriginalName()//nombre original de la foto
            
        ));
        if($foto->save()){
            //guardamos la imagen en public/img con el nombre original
            $file->move("img",$file->getClientOriginalName());
            //redirigimos con un mensaje flash
            return Redirect::to('upload')->with(array('confirm' => 'Cargaste la foto correctamente.'));
        } 
    }
	
	}
	
	public function store()
	{
		//
	}
	
	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}


}
