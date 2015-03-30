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
		$ListaDeItemsOks=Itemsok::all();
		$ListaDeFotos=Foto::where('idevento','=',$idevento)->get();
		 return View::make('eventos.Evento',array('TEvento' => $TEvento,'listaDeInvitados' => $listaDeInvitados,'listaDeItems'=>$listaDeItems,'ListaDeItemsOks'=>$ListaDeItemsOks,'ListaDeFotos'=>$ListaDeFotos));
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
		return Redirect::to("/Evento/$idevento");
		
	
	}
	public function AsignarItem()
	{
		$idevento=Input::get('ideventoN');
		$NitemOK=new Itemsok;
		$NitemOK->iditem=Input::get('iditem');
		$NitemOK->cantidad=Input::get('CantidadAsignada');
		$nombredelusuario=Input::get('UsuarioAAsignar'); //verificar ya que ingresa el nombre
		$invitados=Invitado::where('idevento','=',$idevento)->get();
		foreach ($invitados as $invitado) 
		{
			$usuario=Usuario::find($invitado->idusuario);
			if(($usuario->username)==$nombredelusuario)
			{
				$NitemOK->idusuario=$invitado->idusuario;
				$NitemOK->save();
			}
		}
		return Redirect::to("/Evento/$idevento");
	}
	public function llevarItem()
	{
		$NitemOK=new Itemsok;
		$NitemOK->iditem=Input::get('iditem');
		$NitemOK->cantidad=Input::get('Cantidad');
		$NitemOK->idusuario=Input::get('iddelusuario');
		$NitemOK->save();
		$idevento=Input::get('ideventoN');
		return Redirect::to("/Evento/$idevento");



	}
	public function imagenes()
	{
		$file=Input::file('file');
		$idevento=Input::get('ideventoN');

		if($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'JPG' )
		{

			$url_image=$file->getClientOriginalName();

			$Destinopath=public_path().'/img/ImagenesEvento/';

			$subir=$file->move($Destinopath,$url_image);

			$Fotos=new Foto;
			$Fotos->idevento=$idevento;
			$Fotos->titulo=Input::get('titulo');
			$Fotos->photo=$Destinopath.$url_image;
			$Fotos->save();
		}

		return Redirect::to("/Evento/$idevento");
	}

	public function EliminarItem()
	{
		$idevento=Input::get('ideventoN');
		$iditemok=Input::get('iditemeliminar');
		$usuarioid=Input::get('iddelusuario');
		$item=Itemsok::find($iditemok);
		$item->delete();
		return Redirect::to("/Evento/$idevento");
	}

	Public function eliminarinvitado($idinvitado)
	{
		$invitado=Invitado::find($idinvitado);
		$idevento=$invitado->idevento;
		$invitado->delete();
		return Redirect::to("/Evento/$idevento");


	}
	public function reenvio($invitadoid)
	{
		$msj =null;
		$invitado=Invitado::find($invitadoid);
		$usuario=Usuario::find($invitado->idusuario);
		$evento=Evento::find($invitado->idevento);
		$creador=Usuario::find($evento->creador);
	 	$data= array(
	 	 	'nombre' => $usuario->username,
	 	 	'email' => $invitado->email,
	 	 	'creador'=> $creador->username
	 	 	);
	 	 $FromEmail = 'admin@asadordeeventos.890m.com';
	 	 $FromName = 'administrador';
	 	 $toName=$usuario->username;
	 	 $toEmail=$invitado->email;
	 	
	 	Mail::send('emails.recordatorio', $data, function($mensaje) use ($FromEmail,$FromName,$toEmail,$toName)
	 	 {
	 	 	$mensaje->to($toEmail,$toName);
	 	 	$mensaje->from($FromEmail,$FromName);
	 	 	$mensaje->subject('Acordate del evento!');
	 	 });
	 	$idevento=$invitado->idevento;
		return Redirect::to("/Evento/$idevento");
	}

	public function EnviarCuentas($IdInvitado)
	{
		$invitado=Invitado::find($IdInvitado);
		$usuario=Usuario::find($invitado->idusuario);
		$evento=Evento::find($invitado->idevento);
		$creador=Usuario::find($evento->creador);
		$data=array(
			'nombre'=>$usuario->username,
			'creador'=>$creador->username,
			'mail'=>$invitado->email,
			'costos'=>$invitado->costo,
			'gastos'=>$invitado->gasto
			);
		$FromEmail = 'admin@asadordeeventos.890m.com';
	 	 $FromName = 'administrador';
	 	 $toName=$usuario->username;
	 	 $toEmail=$invitado->email;
	 	 Mail::send('emails.cuentas', $data, function($mensaje) use ($FromEmail,$FromName,$toEmail,$toName)
	 	 {
	 	 	$mensaje->to($toEmail,$toName);
	 	 	$mensaje->from($FromEmail,$FromName);
	 	 	$mensaje->subject('cuentas del evento');
	 	 });
	 	$idevento=$invitado->idevento;
		return Redirect::to("/Evento/$idevento");

	}
}
