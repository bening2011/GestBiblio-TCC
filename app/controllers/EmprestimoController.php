<?php

class EmprestimoController extends BaseController {

	

	public function getIndex(){
		$lista5 = TabelaEmprestimo::
		join('cliente', 'emprestimo.id_clientedois', '=','id_cliente')->select('emprestimo.*','nome')->get();
		

		return View::make ('ListarEmprestimo', compact('lista5'));
	}

	public function getAdicionar(){
		$livros = TabelaLivro::lists('nome_livro', 'id_livro');
		$exemplares = TabelaExemplar::lists('id_exemplar', 'id_exemplar');
		$clientes = TabelaCliente::lists('nome','id_cliente');
		return View::make('CadastrarEmprestimo', compact('livros', 'exemplares','clientes'));
	}

	public function postAdicionar(){
		$emprestimo = new TabelaEmprestimo();
		$exememp= new TabelaExemEmp();
		$usuemp= new TabelaUsuEmp();
		$emprestimo->id_clientedois = Input::get('id_cliente');
		$emprestimo->data_provavel_devolucao = Input::get('data_provavel_devolucao');
		$emprestimo->save();
		
		$idemprestimo = DB::table('emprestimo')->max('id_emprestimo');
		
		$exememp->emprestimo = $idemprestimo;
		$exememp->exemplar = Input::get('id_exemplar');
		$exememp->save();
		$usuemp->cliente = Input::get('id_cliente');
		$usuemp->emprestimo = $idemprestimo;
		$usuemp->usuario = '12';
		
		//$valida = Validator::make($emprestimo->toArray(), $this->rules);
		
		//if($valida->fails()){
		//	return Redirect::to('emprestimo/adicionar')
		//	->withErrors($valida)
		//	->withInput();
		//} 
		
		$usuemp->save();

		return Redirect::to('emprestimo');
	}

	public function getEditar($id_exemplar){
		$exemplares = TabelaExemplar::join('livro', 'exemplar.id_livrodois', '=','id_livro')->select('exemplar.*','nome_livro')->
		where('id_exemplar', $id_exemplar)->get();
		$exemplares = $exemplares[0];

				return View::make('EditorExemplar', compact('exemplares')) ;
	}

	public function postEditar($id_exemplar){
		$exemplar = TabelaExemplar::find($id_exemplar);
		$exemplar->estado_livro = Input::get('estado_livro');
		$exemplar->emprestado = Input::get('emprestado');
		$valida = Validator::make($exemplar->toArray(), $this->rules);
		
		if($valida->fails()){
			return Redirect::to('exemplar/adicionar')
			->withErrors($valida)
			->withInput();
		} 
		$exemplar->save();

		return Redirect::to('exemplar');
	}

	public function getDeletar($id_exemplar){
		$deletar = TabelaExemplar::find($id_exemplar) ;
		$deletar->delete();

		return Redirect:: to('exemplar');
	}

	public function MissingMethod($params = array()){
		return 'Nada encontrado :D';
	}

	public function getListar()
	{
		

	}

}
