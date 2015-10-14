<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cliente extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema :: create ('cliente', function ($table){
                    $table->increments('id_cliente');
                    $table->string('nome',25 );
                    $table->string('nome_pai',20);
                    $table->string('nome_mae',20);
                    $table->string('email',25);
                    $table->string('email_escola',25); 
                    $table->string('email_pais',25); 
                    $table->string('cidade',20); 
                    $table->string('estado',20);
                    $table->string('telefone',20);  
                    $table->string('endereco',50); 
                    $table->string('escola',20);  
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema :: drop('cliente');
	}

}
