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
			$NEvento -> direccion=Input::get('direccion');
			$NEvento -> descripcion=Input::get('descripcion');
			$NEvento -> latitud=Input::get('Latitud');
			$NEvento -> longitud=Input::get('Longitud');
			$NEvento -> adultosmax=Input::get('adultosmax');
			$NEvento -> menoresmax=Input::get('menoresmax');
			$NEvento -> metodocuenta=Input::get('menoresmax');
			$NEvento -> creador=Session::get('usuario_id');
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
	public function VerEvento($idevento=null)
	{
		$TEvento=Evento::find($idevento);
		$listaDeInvitados=Invitado::where('idevento','=',$idevento)->get();
		$listaDeItems=Item::where('idevento','=',$idevento)->get();
		 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados,'listaDeItems'=>$listaDeItems));
// si se modifica ver que se copio lo mismo en destroy
		
	}
	 
	 public function destroy($idevento)
	{
		$TEvento=Evento::find($idevento);
		if ($TEvento->delete())
		{
		Session::flash('message','Se ha eliminado correctamente');
		Session::flash('class','success');
		}else
		{
		Session::flash('message','ha ocurrido un error!');
		Session::flash('class','danger');
		}
		return Redirect::to('MisEventos');
	}
	public function destroyitem($iditem)
	{
		$Bitem=Item::find($iditem);
		if ($Bitem->delete())
		{
		Session::flash('message','Se ha eliminado el item correctamente');
		Session::flash('class','success');
		}else
		{
		Session::flash('message','ha ocurrido un error! al eliminar el item');
		Session::flash('class','danger');
		}
		
		$idevento= $Bitem->idevento;
		//$TEvento=Evento::find($idevento);
		//$listaDeInvitados=Invitado::where('idevento','=',$idevento)->get();
		//$listaDeItems=Item::where('idevento','=',$idevento)->get();
		// return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados,'listaDeItems'=>$listaDeItems));
		return Redirect::to("/Evento/$idevento");


	}

	public function AgregarItem()
	{
		$idevento=Input::get('ideventoN'); 
		$NItem =new Item;
		$NItem->idevento=Input::get('ideventoN');
		$NItem->nombre=Input::get('Item');
		$NItem->cantidad=Input::get('Cantidad');
		$NItem->save();
		$TEvento=Evento::find($idevento);
		$listaDeInvitados=Invitado::where('idevento','=',$idevento)->get();
		$listaDeItems=Item::where('idevento','=',$idevento)->get();
		 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados,'listaDeItems'=>$listaDeItems));

	
	}

	// public function invitar($idevento=null)
	// {
		

	// 		$msj =null;
	// 		$data= array(
	// 			'nombre' => Input::get('nombre'),
	// 			'email' => Input::get('email')
	// 			);
	// 		$FromEmail = 'asadordeeventos@gmail.com';
	// 		$FromName = 'administrador';

	// 		Mail::send('emails.invitado', $data, function($mensaje) use ($FromEmail,$FromName)
	// 		{
	// 			$mensaje->to($FromEmail,$FromName);
	// 			$mensaje->from($FromEmail,$FromName);
	// 			$mensaje->subject('Nuevo Mail de Contacto');
	// 		});		

	// 	return View::make('contacto');
		
	// }


}
