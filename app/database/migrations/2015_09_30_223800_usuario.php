<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema ::create('usuario', function ($table){
                    $table->increments('id_usuario'); 
                    $table->string('nome',25);
                    $table->mediuminteger('cpf');  
                    $table->string('rg',20);  
                    $table->string('endereco',50); 
                    $table->string('estado',20); 
                    $table->string('telefone',20); 
                    $table->string('cidade',20);
                    $table->string('email',20); 
                    $table->string('login',20); 
                    $table->string('senha',20); 
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema :: drop('usuario');
	}

}
