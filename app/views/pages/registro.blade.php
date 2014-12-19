<html>

<head>
	@include('includes.headR')
</head>
@section('content')
	
<body>	
	<div class="container" > 
    	<div class="well">'/registro'
			<!--{{Form::open()}}-->
{{Form::open(array('method'=>'POST','url'=>'/registro','role'=>'form'))}} 

              <fieldset>
                  <legend>Registro</legend>
                  <!--Nombre-->
                  <div class="form-group">
                     {{Form::label('username', 'Usuario')}}
                      
                          {{Form::text('username')}}
                           
                    
                  </div>
				  
				  <!--Apellido-->
				  <div class="form-group">
                      {{Form::label('apellido', 'Apellido')}}
                      
                         {{Form::text('apellido')}}
                           
                    
                  </div>
                                   
                <!--Mail-->
                  
                <div class="form-group">
                    {{Form::label('email', 'E-mail')}}
                      
                          {{Form::text('email')}}
                </div>
                <!-- Contraseña -->
                <div class="form-group">
    				{{Form::label('password', 'Contraseña')}}
                      
                          {{Form::password('password')}}
  				</div>
  				<!--confirmacion password-->
  				<div class="form-group">
                   {{Form::label('verificacion', 'Repita la Contraseña')}}
                      
                          {{Form::password('verificacion')}}
 			    </div>
                <!--Fecha de Nacimiento-->                  

				<div class="form-group">
                    <label for="inputFecha" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                    <div class="col-lg-5">
                        <input class="form-control" id="dateFecha" type="date" name="nacimiento" >
                    </div>
                </div>
               
                  <!--Sexo-->
                <div class="form-group">
           {{Form::label('sexo', 'Femenino')}}
                      
                          {{Form::radio('sexo', 'femenino', 'selected')}}
           
               {{Form::label('sexo', 'Masculino')}}
                      
                          {{Form::radio('sexo', 'masculino')}}
        </div>
                 <!--Provincias-->
                <div class="form-group">
                    <label for="selectProvincia" class="col-lg-2 control-label">Provincia</label>
                    <div class="col-lg-5">
                        <select class="form-control" id="selectProvincia" name="provincias">
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Capital Federa">Capital Federal</option>
                            <option value="Catamarca">Catamarca</option>
                            <option value="Chaco">Chaco</option>
                            <option value="Chubut">Chubut</option>
                            <option value="Córdoba">Córdoba</option>
                            <option value="Corrientes">Corrientes</option>                            
                            <option value="Entre Ríos">Entre Ríos</option>
                            <option value="Formosa">Formosa</option>
                            <option value="Jujuy">Jujuy</option>
                            <option value="La Pampa">La Pampa</option>
                            <option value="La Rioja">La Rioja</option>
                            <option value="Mendoza">Mendoza</option>
                            <option value="Misiones">Misiones</option>
                            <option value="Neuquén">Neuquén</option>
                            <option value="Río Negro">Río Negro</option>
                            <option value="Salta">Salta</option>
                            <option value="San Juan">San Juan</option>
                            <option value="San Luis">San Luis</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Santa Fe">Santa Fe</option>
                            <option value="Santiago del Estero">Santiago del Estero</option>
                            <option value="Tierra del Fuego">Tierra del Fuego</option>
                            <option value="Tucumán">Tucumán</option>
                       </select>
                    </div>     
                </div>
                <!--Ciudad--> 
                <div class="form-group">
                   {{Form::label('ciudad', 'Ciudad')}}
                      
                          {{Form::text('ciudad')}}
                </div>
                <!--Textarea-->
                <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Terminos y Condiciones </br></label>
                    <div class="col-lg-5">
                      <textarea class="form-control " rows="5" id="textArea" disabled="disabled">TERMINOS Y CONDICIONES
La utilización de nuestro sitio implica su aceptación plena y sinreservas a todas y cada una de las disposiciones incluidas en este Aviso Legal, por lo que si usted no está de acuerdo con cualquiera de las condiciones aquí establecidas, no deberá usar u/o acceder a este sitio.
 Reservamos el derecho a modificar esta Declaración de Privacidad en cualquier momento. Su uso continuo de cualquier porción de este sitio tras la notificación o anuncio de tales modificaciones constituirá su aceptación de tales cambios
                      </textarea>             
                    </div>
               </div>
               <!--CheckBox-->
              <div class="form-group">
               
                  {{Form::checkbox('terms', 'true')}}
                  {{Form::label('Acepto terminos y condiciones')}}
                      
                          
               
               </div>
               <!--Boton-->
                <div class="form-group">
                  {{Form::submit('Aceptar')}}
                </div>
            </fieldset>
          {{Form::close()}}
        </div>
        
	</div>
      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js"></script>
    <script src="js/jquery2-0-0.min.js"></script>
    <script src="js/jquery.validate.js"></script>
	<script src="js/validaciones.js"></script>-->
    
	
</body>
</html>	

