<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Emprestimo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema :: create('emprestimo', function ($table){
                   $table->increments('id_emprestimo');
                   $table->integer('id_cliente')->unsigned();
                   $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
                   $table->date('data_emprestimo');
                   $table->date('data_provavel_devolucao');
                   $table->date('data_devolucao');
                
	});
        }
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema :: drop('emprestimo');
        }

}
