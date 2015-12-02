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
Route::get('/',
        array(
            'as' => 'home', 
            'uses' => 'HomeController@getIndex'
            )
        );

Route::get('entrar', 'HomeController@getEntrar');
Route::post('entrar', 'HomeController@postEntrar');
Route::get('sair', 'HomeController@getSair');

Route::when('*', 'csrf',  array('POST'));

Route::group(array('before' => 'auth'), function()
{

Route::controller('cliente', 'ClienteController');

Route::controller('exemplar', 'ExemplarController');
Route::group(array('before' => 'auth.admin'), function()
    {
Route::controller('relatorio', 'RelatorioController');
Route::controller('usuario', 'UsuarioController');
Route::controller('pdf', 'FpdfController');
});
Route::controller('livro', 'LivroController');

Route::controller('emprestimo', 'EmprestimoController');
Route::get('/home', function()
    {
        return View::make ('home');
    });
});





