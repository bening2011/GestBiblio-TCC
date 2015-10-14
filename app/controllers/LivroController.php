<?php

class LivroController extends BaseController {

	
private $rules = array('nome_autor' =>  'required', 'secao' =>'required', 'edicao' =>'required',
					   'nome_editora' =>'required', 'ano' =>'required', 'data_entrada' =>'required', 'nome_livro' =>'required');
	public function getIndex(){
		$lista3 = TabelaLivro::get();

		return View::make ('ListarLivro', compact('lista3'));
	}

	public function getAdicionar(){
		return View::make('EditorLivro');
	}

	public function postAdicionar(){
		$dados = Input::all();
		$livro = new TabelaLivro($dados);
		$valida = Validator::make($livro->toArray(), $this->rules);
		
		if($valida->fails()){
			return Redirect::to('livro/adicionar')
			->withErrors($valida)
			->withInput();
		} 
		
		$livro->save();

		return Redirect::to('livro');
	}

	public function getEditar($id_livro){
		$livros = DB::table('livro')->where('id_livro', $id_livro)->get();
		$livros = $livros[0];

				return View::make('EditorLivro', compact('livros')) ;
	}

	public function postEditar($id_livro){
		$livro = TabelaLivro::find($id_livro);
		$livro->nome_autor = Input::get('nome_autor');
		$livro->secao = Input::get('secao');
		$livro->edicao = Input::get('edicao');
		$livro->nome_editora = Input::get('nome_editora');
		$livro->ano = Input::get('ano');
		$livro->data_entrada = Input::get('data_entrada');
		$livro->nome_livro = Input::get('nome_livro');
		$valida = Validator::make($livro->toArray(), $this->rules);
		
		if($valida->fails()){
			return Redirect::to("livro/editar/{id_livro}")
			->withErrors($valida)
			->withInput();
		} 
		$livro->save();

		return Redirect::to('livro');
	}

	public function getDeletar($id_livro){
		$deletar = TabelaLivro::find($id_livro) ;
		$deletar->delete();

		return Redirect:: to('livro');
	}

	public function MissingMethod($params = array()){
		return 'Nada encontrado :D';
	}

	public function getListar()
	{
		

	}

}
