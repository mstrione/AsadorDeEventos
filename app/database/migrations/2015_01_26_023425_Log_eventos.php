<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogEventos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('log_eventos',function($table)
			{
				$table->create();

				$table->increments('id');

				$table->integer('evento_l')->unsigned();
				$table->foreign('evento_l')->references('id')->on('eventos')->onDelete('cascade');
				$table->date('fecha_l'); 
				$table->time('hora_l');
				$table->string('username_l',30);
				$table->string('mensaje');

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
		Schema::drop('log_eventos');
	}

}
