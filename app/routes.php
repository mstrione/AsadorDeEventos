<?php

//WebController*******************************************
Route::get('/', 'HomeController@showPrincipal');
Route::get('/aboutUs', 'HomeController@showAboutUs');
Route::get('/about', 'HomeController@showAbout');

//contacto
Route::get('/contacto', 'HomeController@get_contacto');
Route::post('/contacto', 'HomeController@contacto');

//RUTA USUARIOS********************************************
Route::get(Lang::get('routes.login'), 'UsuarioController@get_login');
Route::post(Lang::get('routes.login'), 'UsuarioController@post_login');
Route::get(Lang::get('routes.logout'), 'UsuarioController@logout');
Route::get('/bienvenida', 'UsuarioController@bienvenida');
Route::get('/MisEventos', 'MisEventosController@index');

//RUTA registro********************************************
Route::get('/registro', 'registroController@get_registro');
Route::post('/registro', 'registroController@post_registro');

//RUTA PARA ITEM----------------------------------

Route::get('/itempop', 'ItemController@get_Item');
Route::post('/itempop', 'ItemController@post_Item');
/*Route::get('/itempop', 'ItemController@show_item');
Route::post('/itempop', 'ItemController@delete_item');*/

Route::get('/upload', 'FotoController@get_foto');
Route::post('/upload', 'FotoController@post_foto');
Route::get('agregarinvitado', function()
{
	return View::make('pages.agregarinvitado');
});

Route::get('crearEvento', 'EventoController@get_crearEvento');
Route::post('crearEvento', 'EventoController@get_EventoX');
Route::post('/MisEventos','EventoController@get_EventoX');
Route::get('/MisEventos/destroy/{id}','EventoController@destroy');
Route::post('/MisEventos','MisEventosController@asistencia') ;
Route::post('/MisEvento','MisEventosController@gastos'); 

Route::get('/Evento/{idevento?}','EventoController@VerEvento');
Route::post('/invitar','InvitadoController@invitar');
Route::post('/Evento/','InvitadoController@cuenta');
Route::get('/perfil','UsuarioController@MostralPerfil');
Route::get('/terminos', 'HomeController@terminos');
Route::post('/Evento/items','EventoController@AgregarItem');
Route::get('/Evento/destroy/{id}','EventoController@destroyitem');
Route::post('llevarItem','EventoController@llevarItem');
Route::post('/AsignarItem','EventoController@AsignarItem');
Route::post('/Eventos/imagenes','EventoController@imagenes');
Route::post('/Eventos/eliminaritem','EventoController@EliminarItem');