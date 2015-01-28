<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('includes.headC')
    {{ HTML::script('js/vallenato.js') }}
    {{ HTML::style('css/vallenato.css') }}
    {{ HTML::script('js/datepicker.js') }}
    {{ HTML::script('js/MapaEvento.js') }}
    {{ HTML::style('css/datepicker.css') }}
    {{ HTML::style('css/EstiloMapa.css') }}
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script >google.maps.event.addDomListener(window, 'load', initialize);  
    </script>
</head>
<body>
 @include('includes.headersesion')

 <div class="container"> 
        <div class="well"> 
            <div><h1 id="type"> Mis Eventos</h1></div>
<div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
              <form class="form-horizontal">
                <fieldset>
                  <legend>Datos del evento</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Nombre del evento</label>
                    <div class="col-lg-10">
                      <input class="form-control" id="disabledInput" type="text" placeholder="" disabled="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Lugar</label>
                    <div class="col-lg-10">
                      <input class="form-control" id="disabledInput" type="text" placeholder="" disabled="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">fecha y hora </label>
                    <div class="col-lg-10">
                      <input class="form-control" id="disabledInput" type="text" placeholder="" disabled="">
                    </div>
                  </div>

                 <div class="form-group">
                      <label for="textArea" class="col-lg-2 control-label">Descripcion del evento</label>
                      <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="textArea" disabled=""></textarea>        
                      </div>
                    </div>

                </fieldset>
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-lg-offset-0">

              <form class="bs-component">
                    <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">posicion del Evento</h3>
  </div>
  <div class="panel-body">
    <div id="map-canvas"></div>
  </div>
</div>
                

         
              </form>

          </div>
        </div>
      </div>



        </div>
</div>    
  
</body>
    @include('includes.footer')
</html>