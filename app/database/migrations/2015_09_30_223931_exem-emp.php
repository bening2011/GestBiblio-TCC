<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExemEmp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema:: Create('exem-emp', function ($table){
                    $table->integer('exemplar')->unsigned();
                   $table->foreign('exemplar')->references('id_exemplar')->on('exemplar');
                   $table->integer('emprestimo')->unsigned();
                   $table->foreign('emprestimo')->references('id_emprestimo')->on('emprestimo');
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
		Schema :: Drop('exem-emp');
	}

}
