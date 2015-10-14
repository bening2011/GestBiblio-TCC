<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Exemplar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema :: create('exemplar', function ($table){
                   $table->increments('id_exemplar');
                   $table->integer('id_livrodois')->unsigned();
                   $table->foreign('id_livrodois')->references('id_livro')->on('livro');
                   $table->string('estado_livro');
                   $table->boolean('emprestado');
	});
        }
	
	public function down()
	{
		Schema :: Drop('exemplar');
	}

}
