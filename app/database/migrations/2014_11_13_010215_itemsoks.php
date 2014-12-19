<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Itemsoks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('itemsoks',function($table) // creo los campos de la tabla de items que se llevan
		{
			$table->create();
			
			$table->increments('id');
			
			$table->integer('iditem'); 			
			$table->integer('cantidad'); 
			$table->integer('idusuario');
			
			
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('itemsoks');
	}

}
