<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::when('*', 'csrf',  array('POST'));

Route::controller('cliente', 'ClienteController');

Route::controller('exemplar', 'ExemplarController');

Route::controller('usuario', 'UsuarioController');

Route::controller('livro', 'LivroController');

Route::controller('emprestimo', 'EmprestimoController');

Route::get('/', function(){
	return View::make('login');
});
