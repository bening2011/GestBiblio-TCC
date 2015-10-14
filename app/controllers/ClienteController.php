<?php

class ClienteController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex(){
		$lista = TabelaCliente::get();

		return View::make ('ListarCliente', compact('lista'));
	}

	public function getAdicionar(){
		return View::make('EditorCliente');
	}

	public function postAdicionar(){
		$cliente = new TabelaCliente();
		$cliente->nome_pai = Input::get('nome_pai');
		$cliente->cidade = Input::get('cidade');
		$cliente->endereco = Input::get('endereco');
		$cliente->nome = Input::get('nome');
		$cliente->estado = Input::get('estado');
		$cliente->telefone = Input::get('telefone');
		$cliente->email = Input::get('email');
		$cliente->nome_mae = Input::get('nome_mae');
		$cliente->escola = Input::get('escola');
		$cliente->email_pais = Input::get('email_pais');
		$cliente->email_escola = Input::get('email_escola');
		$rules = array('nome_pai' =>'required', 'cidade' =>'required', 'endereco' =>'required', 'nome' =>'required',
					   'estado' =>'required', 'nome_mae' =>'required');
		$valida = Validator::make($cliente->toArray(), $rules);
		
		if($valida->fails()){
			return Redirect::to('cliente/adicionar')
			->withErrors($valida)
			->withInput();
		} 
		$cliente->save();

		return Redirect::to('cliente');
	}

	public function getEditar($id_cliente){
		$clientes = DB::table('cliente')->where('id_cliente', $id_cliente)->get();
		$clientes = $clientes[0];

				return View::make('EditorCliente', compact('clientes')) ;
	}

	public function postEditar($id_cliente){
		$editar = TabelaCliente::find($id_cliente);
		$editar->nome_pai = Input::get('nome_pai');
		$editar->cidade = Input::get('cidade');
		$editar->endereco = Input::get('endereco');
		$editar->nome = Input::get('nome');
		$editar->estado = Input::get('estado');
		$editar->telefone = Input::get('telefone');
		$editar->email = Input::get('email');
		$editar->nome_mae = Input::get('nome_mae');
		$editar->escola = Input::get('escola');
		$editar->email_pais = Input::get('email_pais');
		$editar->email_escola = Input::get('email_escola');
		$rules = array('nome_pai' =>'required', 'cidade' =>'required', 'endereco' =>'required', 'nome' =>'required',
					   'estado' =>'required', 'nome_mae' =>'required');
		$valida = Validator::make($editar->toArray(), $rules);
		
		if($valida->fails()){
			return Redirect::to("cliente/editar/{$id_cliente}")
			->withErrors($valida)
			->withInput();
		} 
		$editar->save();
	
			return Redirect::to('cliente');

	}

	public function getDeletar($id_cliente){
		$deletar = TabelaCliente::find($id_cliente) ;
		$deletar->delete();

		return Redirect:: to('cliente');

	}

	public function MissingMethod($params = array()){
		return 'Nada encontrado :D';
	}

	public function getListar()
	{
		

	}

}
