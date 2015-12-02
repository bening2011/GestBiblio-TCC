<?php

class ExemplarController extends BaseController {


	private $rules = array('estado_livro' => 'required', 'ano' => 'required', 'edicao' => 'required'  );

	public function getIndex(){
		$lista4 = TabelaExemplar::join('livro', 'exemplar.id_livrodois', '=','id_livro')->select('exemplar.*','nome_livro')->get();
		
		foreach ($lista4 as $key => $value) {
			if($value->emprestado == 1){
				$lista4[$key]->emprestado = 'Sim';
			} else{
				$lista4[$key]->emprestado = 'Não';
			}
		}

		return View::make ('ListarExemplar', compact('lista4','nomelivro'));
	}
	public function postIndex(){
    		$buscado = Input::get('lst_busca');
    		$lista5 = TabelaExemplar::where('id_exemplar', 'like', '%'.$buscado.'%')->get();
    		return View::make('ListarEmprestimo', compact('lista5')) ;
    }

	public function getAdicionar(){
		$livros = TabelaLivro::lists('nome_livro', 'id_livro');
		
		return View::make('CadastrarExemplar', compact('livros'));
	}

	public function postAdicionar(){
		$dados = new TabelaExemplar();
		$dados->id_livrodois = Input::get('id_livrodois');
		$dados->estado_livro = Input::get('estado_livro');
		$dados->ano = Input::get('ano');
		$dados->edicao = Input::get('edicao');
		$dados->data_entrada = date("Y.m.d"); 
		

		$valida = Validator::make($dados->toArray(), $this->rules);
		
		if($valida->fails()){
			return Redirect::to('exemplar/adicionar')
			->withErrors($valida)
			->withInput();
		} 
		$dados->save();
		$etiqueta = DB::table('exemplar')->max('id_exemplar');
		$exemplares = TabelaExemplar::join('livro', 'exemplar.id_livrodois', '=','id_livro')->select('exemplar.*','nome_livro')->
		where('id_exemplar', $etiqueta)->get();
		$exemplares = $exemplares[0];
		$pdf= new Fpdf('L','mm',array(50,30));
		$pdf->AddPage();
		$pdf->Code39(15,5,$etiqueta,1,15);
		// $pdf->SetFont('Arial','',8);
		// $pdf->ln(15);
		// $pdf->Cell(2,10,utf8_decode($exemplares->id_exemplar));
		// $pdf->ln(5);
		// 		$pdf->Cell(5,10,utf8_decode($exemplares->nome_livro));
		// 		$pdf->ln(5);

		// $pdf->Cell(5,10,utf8_decode($exemplares->ano));
		// 		$pdf->ln(5);
		// $pdf->Cell(5,10,utf8_decode($exemplares->edicao));				

		
		$pdf->Output();
		exit;

		return Redirect::to('exemplar');
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
