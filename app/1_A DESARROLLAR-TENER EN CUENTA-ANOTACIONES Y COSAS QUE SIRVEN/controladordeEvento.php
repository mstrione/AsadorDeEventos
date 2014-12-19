//Para el controlador de evento
<?
public function EventoAccion()
	{
		if (!isset $_GET ['idevento'] == '')
		{
			//Tirar un alerta de que no se encontro ningun evento
		}
	
		if (el usuario no ha iniciado sesion)
		{
		$this->redirect($this->createUrl('site/login')); // Redirigir a la pagina de login.
		}
		
		//realizo conexion a la base de datos
		
		$consultainvitado= "SELECT rol FROM invitados WHERE ";
		$consultainvitado= "evento='".$_GET['idevento']."' AND ";
		$consultainvitado= "usuario='"PASO ID DEL USUARIO"'";
		$result=$conexion //y tengo que crear el comando para la consulta.
		$daRol= $result->query(); // deberia obtener el valor del result con el query y guardarlo en la variable daRol
		$rol='';
		
		foreach($daRol as $fila) //me busca en bloques a daRol en la fila
            {
                $rol=$fila['rol']; //al rol le asigno el encontrado.
            }
		
		/*nuevo 
			gastos;
			agregarInvitado;
            agregarItem;
            llevarItem;
            cuentas;
		*/
		
		
		if ( $rol == 'organizado') // hay que agregar en la migracion 1 caracter mas. porque era de hasta 10. y organizador=11
		{
			//aca me debe dar la opcion para agregar invitado y lo relacionado.
		
		
		}
		
		if (isset($_POST['agregar invitado']))
		{
			//guardo si se envio el post de invitado
			//si lo de invitado esta validado...
			
			if(.....)
			{
				$conexion= mysql_connect("localhost","root","") or die ("no se puede conectar con la base de datos");
				
				$consulta = "SELECT id FROM usuarios WHERE ";
                $consulta .= "email='"aca paso el email"'";
			
				$result= $conexion //y creo el comando con la consulta
				$damail= $result->query(); // deberia obtener el valor del result con el query y guardarlo en la variable damail
				$idusuario='';
				$exist=false;
				
				foreach($damail as $fila)
				{
					$exist=true;
					$idusuario=$fila['id'];   //aca entonces si el mail existe lo pone en true y obtengo el id del usuario con ese mail.
				
				}
				if ($exist==true)
				{
					$consult="SELECT id FROM invitados WHERE ";
					$consult="usuario='".$idusuario."' AND ";
					$consult="evento='".$_GET['idevento']."'";
					
					$resultado = $conexion->//creo comando con la ($consulta);
					
					$dainv = $resultado->query(); // deberia obtener el valor del result con el query y guardarlo en la var dainv
				    $existInvitado = false;
                                    
                    foreach($dainv as $fila)
                    {
                        $existInvitado = true;
                    }
					
					if($existInvitado == true)
                    {
                        $msg = "El usuario ya fue invitado al evento"; //tiro el mensaje con algun alerta
                        
                    }
					
					
					$consultInvitado= //nueva consulta en la BD
					$consultInvitado-> //Guardo el invitado mandando por $_GET el id de evento, el id de usuario y el rol que seria invitado.
				}
				
				else {
                                    $consultInvitado = //nueva consulta en la BD
                                    $consultInvitado->//guardo usuario inactivo paso nombre, apellido, fechanac como 0000-00-00 , '1' el mail y pass
                                    
                                    $consult = "SELECT id FROM usuarios WHERE ";
                                    $consult .= "email='"paso el mail de invitado"'";
                                    $result = $conexion->//creo el comando para consulta($consulta);
                                    
                                    $filaidusuario = $resultado->query();
                                    $existe = false;
                                    $idusuario = '';
									
									foreach($filaidusuario as $fila)
                                    {
                                        $existe = true;
                                        $idusuario=$fila['id'];
                                    }
									
									if($existe === true)
                                    {
                                        $consultInv= //nueva consultasDB;
                                        $consultaInv->//guardar_invitado $_GET obtengo idevento, idusuario, '0','0',rol de invitado '0'0'
                                    }
                                    else
                                    {
                                        $msg = "La invitación no pudo ser efectuada"; //tiro alerta
                                        
                                    }
			
			
			
			}
		
		}
		//---------------------------CERRAR LISTA---------------------------
				if(isset($_GET['cerrarlista']))
                {
                    $consulta = //neuva consulta para la BD;
                    $consulta->CerrarEvento($_GET['idevento']);
                    //Obtener el id del evento
                }
				
        //---------------------------ABRIR LISTA---------------------------
                if(isset($_GET['abrirlista']))
                {
                    $consulta = //nueva consultasDB;
                    $consulta->AbrirEvento($_GET['idevento']);
                    //me dirijo al evento y obtengo el id del evento
                }
				
		//---------------------------ELIMINAR INVITADO----------------------
		
				if(isset($_GET['eliminarinvitado']) && isset($_GET['idusuario']))
                {
                    $consulta = //nueva consulta en la BD
                    $consulta->EliminarInvitado($_GET['idevento'], $_GET['idusuario'], 'eliminar'); //obtengo los id de usuario y evento, con la accion eliminar
                    $consulta->eliminarItemsOks($_GET['idevento'], $_GET['idusuario']); // para eliminar lo items que llevarian.
                    //me redirijo al evento y obtengo su id
					
                }
				
		//------------------------------
		
		if(isset($_GET['accion']) && isset($_GET['idusuario']))
                {
                    if($_GET['accion']==='invitar') 
                    {
                        $consulta = //nueva consulta en la BD;
                        $consulta->NotificacionInvitado($_GET['idevevento'], $_GET['idusuario']);
                    }
                    else if ($_GET['accion']==='cuentas')
                    {
                        $email= '';
						$nombrevento = '';
                        $gastos = '';
                        $costo = '';
                        
                        
                        $consult = "SELECT nombre, costo, gastos FROM eventos INNER JOIN invitados ";
                        $consult.= "ON eventos.id = invitados.evento ";
                        $consult.= "WHERE eventos.id='".$_GET['idevento']."' ";
                        $consult.= "AND invitados.usuario='".$_GET['idusuario']."'";
                        $result = $conexion->//Creo el comando y hago el query
                        $result->bindColumn(1, $nombrevento); //El número (de primer índice 1) o el nombre de la columna del conjunto de resultados. Si se utiliza el nombre de la columna, tenga en cuenta que el nombre debería coincidir en mayúsculas/minúsculas con la columna, tal como la devuelve el controlador.
                        $result->bindColumn(2, $costo);
                        $result->bindColumn(3, $gastos);
                        while($result->read()!==false)
                        {
                            $nombrevento=$nombreventoev;
                            $costo=$costo;
                            $gastos=$gastos;
                        }
                        
                        $consult = "SELECT email FROM usuarios WHERE id='".$_GET['idusuario']."'";
                        $result = $conexion->//creo el comando con consulta y el query.
                        $result->bindColumn(1, $email);
                        while($resultado->read()!==false)
                        {
                            $email=$email;
                        }
        
                        $asunto = "Cuentas en Meating";
                        $mensaje = "Tus cuentas en el evento '".$nombrevento."' son: <br/>";
                        $mensaje .= "Costo: ".$costo."<br/>";
                        $mensaje .= "Gastos: ".$gastos."<br/>";
                        $mensaje .= "Balance: ".($costo-$gastos)."<br/>";
                        $de = //aca pasarie el nombre de nos y el mail;
                                
                        mail($email, $asunto, $mensaje, $de);
                    }
                    
                    $this->//redirigir al evento con el id evento.
                }
                else if(isset($_GET['accion']))
                {
                    //me conecto a la BD;
                            
                            $consult = "SELECT * FROM invitados INNER JOIN usuarios ";
                            $consult .= "ON invitados.usuario=usuarios.id ";
                            $consult .= "WHERE evento='".$_GET['idevento']."'";
                            
                            $result = $conexion->//creo comando de la consulta;
                            
                            $filas = $resultado->query();
                    
                    switch($_GET['accion']) //aca tengo que obtener las acciones...
                    {
                        case 'invitar':
                            foreach($filas as $fila)
                            {
                                if($fila['notificado']==='0')
                                {
                                    $asunto = "Invitación en Meating";
                                    $mensaje = "Estas invitado a un evento.";
                                    $de = "aca iria de quien";
                                
                                    mail($fila['email'], $asunto, $mensaje, $de );
                                }
                            }
							$this->//redirigir al evento con el id del evento
                            break;
                        
                        case 'reenviar':
                            foreach($filas as $fila)
                            {
                                if($fila['confirmado']==='0')
                                {
                                    $asunto = "Invitación en Meating";
                                    $mensaje = "Has sido invitado a un evento.";
                                    $de = //"de quien";
                                
                                    mail($fila['email'], $asunto, $mensaje, $de);
                                }
                            }
							$this->//redirijo al evento con el id de evento
                            break;
                        
                        case 'cuentas':
                            foreach($filas as $fila)
                            {
                                $costo = '';
                                $nombrevento = '';
                                $gastos = '';
                        
                                $consult = "SELECT nombre, costo, gastos FROM eventos INNER JOIN invitados ";
                                $consult .= "ON eventos.id = invitados.evento ";
                                $consult .= "WHERE eventos.id='".$_GET['idevento']."' ";
                                $consult .= "AND invitados.usuario='".$fila['usuario']."'";
                                $result = $conexion->createCommand($consulta)->query();
                                $result->bindColumn(1, $nombrevento);
                                $result->bindColumn(2, $costo);
                                $result->bindColumn(3, $gastos);
                                while($result->read()!==false)
                                {
                                    $nombrevento=$nombrevento;
                                    $costo=$costo;
                                    $gastos=$gastos;
                                }
                            
                                if($fila['confirmado']==='1')
                                {
                                    $asunto = "Cuentas en Meating";
                                    $mensaje = "Tus cuentas en el evento '".$nombrevento."' son: <br/>";
                                    $mensaje .= "Costo: ".$costo."<br/>";
                                    $mensaje .= "Gastos: ".$gasts."<br/>";
                                    $mensaje .= "Balance: ".($costo-$gastos)."<br/>";
                                    $de = "//de quien con mail de pagina";
                                
                                    mail($fila['email'], $asunto, $mensaje, $de);
                                }
                            }
							$this->//redirijo a evento con id de evento
                            break;
                            
                        case 'eliminaritemsOks':
                            $consulta = "DELETE FROM itemsoks WHERE item='".$_GET['item']."' AND usuario='"//paso id de usuario"'";
                            $resultado = $conexion->//creo comando con la consulta;
                            $resultado->execute();
                            $this->//redirijo a evento con el id evento.
                            break;
                        
                        case 'eliminaritem':
                            $consulta = "DELETE FROM items WHERE id='".$_GET['item']."'";
                            $resultado = $conexion->//creo el comando con la consulta;
                            $resultado->execute();
                            $this->//redirijo a evento con el id del evento
                            break;
                    }
                }
                
				
		// Aca creo algo para poder LLEVAR EL ITEM
            
		if(isset($_POST['llevarItem']))
		{
			//veo el atributo y envio por post el llevar items
			if(//llevaritem esta validado())
			{
                            
                            
                                $consulta = //nueva consulta en la BD;
                                $consulta->guardoitemOK(//obtengo el idusuario, del form obtengo el item y la cantidad);
			}
		}
				
				
				
				
            //Aca necesitaria Agregar item
            
		if(isset($_POST['agregarItem']))
		{
			//deberia enviar el atributo de agregarItem;
			if(esta validado))
			{				
                                $consult = //creo nueva consulta en la BD.
                                $consulta->guardar_item($_GET['idevento'],//de item pongo la cantidad y la descripcion);
			}
		}
        }
            
            
                
                
            //Aca creo algo para los gastos
            
		if(isset($_POST['gastos']))
		{
			//enviar por post el atributo de los gastos
			if(gastos validado())
			{				
                                $consulta = //nueva consulta en la BD;
                                $consulta->gastoGuardar($_GET['idevento'], //obtener id del usuario, y obtener el gasto);
			}
		}
                
            //Aca creo algo para las cuentas (CREARLO COMO EN LAS DEMAS)
                
        if(isset($_POST['cuentas']))
		{
			//enviar por post el atributo de las cuentas
			if(cuentas esta validado())
			{				
                                $consulta = //nueva consulta en la BD;
                                $consulta->cuentasGuardar($_GET['idevento'], //aca se coloca los metodos de las cuentas);
                                
			}
		}
                
                $metodo = '';
                
                $consult = "SELECT metodo FROM eventos ";
                $consult .= "WHERE id='".$_GET['idevento']."'";
                $resultado = $conexion->//creo el comando con el $consulta y hago el query
                $resultado->bindColumn(1, $metodo);
                
                while($result->read()!==false)
                {
                    $metodo = $metodo;
                }
                
                //de las cuentas el ->metodo = $metodo;
                //de las cuentas->val1 = '0';
                //de las cuentas->val2 = '0';
                //de las cuentas->val3 = '0';
                //de las cuentas->val4 = '70';
                //de las cuentas->val5 = '30';
                
            //ACA HAY Q CREAR ALGO PARA LA ASISTENCIA
            
		if(isset($_POST['asistir']))
		{
			//enviar el atributo de asistencoa por =$_POST['asistir'];
			if(si asistir esta validado())
			{				
                                $consult = //nueva consulta en al BD;
                                $consulta->InvitadoConfirm($_GET['idevento'], //aca obtengo el id usuario, luego la cantidad de menores y de adultos);
                                
                                $this->$this->//redirigir al evento con el id del evento
			}
		}
                
                if(isset($_GET['rechazar']))
                {
                    $conexion = //conecto a la BD
                    $consult = "SELECT rol FROM invitados WHERE ";
                    $consult .= "usuario='//id usuario' AND ";
                    $consult .= "evento='".$_GET['idevento']."'";
                    $resultado = $conexion->//creo l comando con la consutla;
                    $filas = $resultado->query();
                    $existe = false;
                    foreach($filas as $fila)
                    {
                         $existe = true;
                         $rol=$fila['rol'];
                    }
                    
                    if($rol !== 'Invitado')
                    {
                        $mensaje = "Su rol es organizador, no puede rechazar";
                        //tiro un cartel de error
                        $this->//se redirije a eventos con un cartel de allerta
                    }
                    
                    
                    $consult = //nueva consulta en la BD;
                    $consult->invitadoDelete($_GET['idevento'],//aca obtengo idusuario, 'noasiste');
                    $consult->eliminarItemsOks($_GET['idevento'], //aca obtengo el id de usuario);
                    $this->//redirijo a eventos;
                }
                
                //CREO ALGO PARA LAS FOTOS
                if(isset($_POST['fotos']))
                {
                    //atributos por post para fotos
                    // aca se deberia llamar a algo que me carue la imagen
                    if(esta validado())
                    {
                        //GUARDO LA IMAGEN;
                    }
                }
        //ACA DEBO RENDERIZAR EL EVENTO CON LOS INVITADOS, LOS GASTOS, CUENTAS, ITEMS, ITEMS LLEVADO, ASISTENCIA Y LAS FOTOS.
		$this->render('evento', //-TODAS LAS COSAS);
	}
		
		
		
		
		
		
		
		
	}