<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Livro extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema :: create('livro', function ($table){
                    $table->increments('id_livro'); 
                    $table->string('nome_autor',25);
                    $table->string('secao',20);
                    $table->string('edicao',10);
                    $table->string('nome_editora',20); 
                    $table->integer('ano'); 
                    $table->date('data_entrada'); 
                    $table->string('nome_livro',20); 
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema :: drop('livro');
	}

}
