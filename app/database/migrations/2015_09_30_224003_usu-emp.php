<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuEmp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema:: Create('usu-emp', function ($table){
                    $table->integer('cliente')->unsigned();
                   $table->foreign('cliente')->references('id_cliente')->on('cliente');
                   $table->integer('emprestimo')->unsigned();
                   $table->foreign('emprestimo')->references('id_emprestimo')->on('emprestimo');
                   $table->integer('usuario')->unsigned();
                   $table->foreign('usuario')->references('id_usuario')->on('usuario');
                   
                }
                        );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema:: Drop('usu-emp');
	}

}
