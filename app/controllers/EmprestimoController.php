<?php

class EmprestimoController extends BaseController {

	private $rules = array('id_clientedois' => 'required', 'data_provavel_devolucao' => 'required' );
	
	public function getIndex(){
		
		$lista5 = TabelaEmprestimo::
		join('cliente', 'emprestimo.id_clientedois', '=','id_cliente')->select('emprestimo.*','nome')->get();
		
		foreach ($lista5 as $key => $value) {
			$lista5[$key] -> pendente = $this->exemplaresEmprestimo($value -> id_emprestimo);

		}
		
		return View::make ('ListarEmprestimo', compact('lista5'));
	
	
	}
	public function exemplaresEmprestimo($i) {
		$exemplares = TabelaExemEmp::where('emprestimo', '=', $i)->get();
		$pendente = 0;
		foreach ($exemplares as $lista) {
			
			if($lista -> devolvido == 0){
				$pendente = $pendente+1;
			}
		}
		
		return $pendente;

	}



public function postIndex(){
    		$buscado = Input::get('lst_busca');
    		$lista5 = TabelaEmprestimo::where('id_emprestimo', 'like', '%'.$buscado.'%')->get();
    		return View::make('ListarEmprestimo', compact('lista5')) ;
    }


	public function getAdicionar(){
		$livros = TabelaLivro::lists('nome_livro', 'id_livro');
		$var = DB::table('exemplar')
            ->join('livro', 'exemplar.id_livrodois', '=', 'livro.id_livro')
            ->select('exemplar.id_livrodois', 'livro.nome_livro')
            ->get();
         

		//$exemplares = TabelaExemplar::join('livro', 'livro.id_livro', '=', 'exemplar.id_livrodois')
// ->select('livro.nome_livro', 'exemplar.id_livrodois', 'exemplar.id_exemplar')
 //->lists('nome_livro', 'id_exemplar');
		$exemplares = TabelaExemplar::where('emprestado', '=', '0')->lists('id_exemplar', 'id_exemplar');
		$clientes = TabelaCliente::lists('nome','id_cliente');
		return View::make('CadastrarEmprestimo', compact('livros', 'exemplares','clientes'));
	}

	public function postAdicionar(){
		$emprestimo = new TabelaEmprestimo();
		
		$usuemp= new TabelaUsuEmp();
		$emprestimo->id_clientedois = Input::get('id_clientedois');
		
		$data = Input::get('data_provavel_devolucao');
	
		if($data == ''){
		
		}else{
			$data = date("Y-m-d",strtotime(str_replace('/','-',$data)));
		}	
		$emprestimo->data_emprestimo = date("Y.m.d"); ;
		$emprestimo->data_provavel_devolucao = $data;
		$valida = Validator::make($emprestimo->toArray(), $this->rules);
		
		if($valida->fails()){
			return Redirect::to('emprestimo/adicionar')
			->withErrors($valida)
			->withInput();
		}
		 $emprestimo->save();
		
		
		$livEmp = Input::get('id_exemplar');
		
		
		

		foreach ($livEmp as $value) {
			$exememp= new TabelaExemEmp();
			$exememp->emprestimo = DB::table('emprestimo')->max('id_emprestimo');
			$exememp->exemplar = $value;
			$livro = DB::table('exemplar')->where('id_exemplar', '=', $value)->first();
			$exememp->livro = $livro->id_livrodois;
			
			$exemplar = TabelaExemplar::find($value);
			$exemplar->emprestado = 1;
			$exememp->save();
			
			$exemplar->save();
		}
		$usuemp->cliente = Input::get('id_clientedois');
		$usuemp->emprestimo = DB::table('emprestimo')->max('id_emprestimo');
		$usuemp->usuario = Auth::id();
		
		
		
		$usuemp->save();

		return Redirect::to('emprestimo/comprovante');
		
	}

	

	public function MissingMethod($params = array()){
		return 'Nada encontrado :D';
	}

	
	public function getDevolucao()
	{
		$emprestimos =TabelaCliente::lists('nome', 'id_cliente');
		
		return View::make ('devolucao', compact('emprestimos'));
	}

	public function emprestimosPendentesCliente($cliente){
		
		$resultado = TabelaEmprestimo::
		join('cliente', 'emprestimo.id_clientedois', '=','id_cliente')
		->select('emprestimo.*','nome')->where ('id_cliente', '=',$cliente) -> get();
		
		foreach ($resultado as $key => $value) {
			$resultado[$key] -> pendente = $this->exemplaresEmprestimo($value -> id_emprestimo);

		}
		
		return $resultado;



	}

	public function postDevolucao(){
		

		$cliente = Input::get('id_cliente');
		
		$dadoscliente = DB::table('cliente')->where('id_cliente', '=', $cliente)->first();

		$resultado = $this->emprestimosPendentesCliente($cliente);


		foreach ($resultado as $key => $value) 
		  {
				
				$value->exememp= DB::table('exem-emp')
							->join('livro', 'exem-emp.livro', '=','id_livro')
							->select('exem-emp.*','nome_livro')
							->where('emprestimo', '=', $value->id_emprestimo)
							->get();
						
		}


		
		return View::make ('devolver', compact('dadoscliente','resultado'));
	}

	public function getComprovante(){
		$emprestimo = DB::table('emprestimo')->max('id_emprestimo');


// DB::table('users')
//             ->join('contacts', 'users.id', '=', 'contacts.user_id')
//             ->join('orders', 'users.id', '=', 'orders.user_id')
//             ->select('users.id', 'contacts.phone', 'orders.price')
//             ->get();
		
            $v2= DB::table('emprestimo')->join
            			  ('cliente', 'emprestimo.id_clientedois', '=', 'cliente.id_cliente')->select
            			  ('emprestimo.id_emprestimo', 'cliente.nome', 'emprestimo.data_provavel_devolucao', 'emprestimo.data_emprestimo')->where
            			  ('emprestimo.id_emprestimo', '=', $emprestimo)->get();
		
         $v3= DB::table('usu-emp')->join
            			  ('usuario', 'usu-emp.usuario', '=', 'usuario.id')->select
            			  ('usu-emp.emprestimo', 'usu-emp.cliente', 'usuario.nome')->where
            			  ('usu-emp.emprestimo', '=', $emprestimo)->get(); 
          			  
		$resultado = DB::table('exem-emp')->where('emprestimo', '=', $emprestimo)->get();
		
		
		
		foreach ($resultado as $key => $value) {
			$exem[$key]=$value->exemplar;
		}
		
		for ($i=0; $i<count($exem); $i++) {
			
			$v4[$i] = TabelaExemEmp::join('livro', 'exem-emp.livro', '=','id_livro')
									->select('exem-emp.*','nome_livro')
									->where('exemplar','=', $exem[$i])
									->get();

			
		}
		
//foreach ($resultado as $key => $result) {
$v2=$v2[0];
$v3=$v3[0];
$data = $v2->data_provavel_devolucao;
$data2 = $v2->data_emprestimo;
$data = date("d-m-Y",strtotime(str_replace('/','-',$data)));
$data2 = date("d-m-Y",strtotime(str_replace('/','-',$data2)));

		$fpdf = new Fpdf('P','mm',array(140,80));
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','',8);
        $fpdf->Cell(0,10,'*****************************************************','','','C');
        $fpdf->Ln();
        $fpdf->Image('vendor\anouar\fpdf\src\Anouar\Fpdf\bibliogest-pdf.png',18,19,45);
        $fpdf->Ln();
        
        $fpdf->Cell(0,10,'COMPROVANTE DE EMPRESTIMO','','','C');
        $fpdf->Ln();
        $fpdf->Cell(0,0,'Data:'.$data2);
        $fpdf->Ln(1);
        $fpdf->Cell(0,0,'_____________________________________','','','C');
        $fpdf->Ln();
        $fpdf->Cell(15,10,'COD.');
        $fpdf->Cell(30,10,'DESCR.');
        $fpdf->Cell(10,10,'DEVOL.');
        $fpdf->Ln(7);
        $fpdf->Cell(0,0,'_____________________________________','','','C');
        $fpdf->Ln(5);
       
       // dd($v4);
       	for ($i=0; $i<count($v4); $i++) {
       		//echo '<pre>';
       		//die(print_r($v4[0][0]->nome_livro));
       		//echo '</pre>';

       		$fpdf->Cell(15,5, $v4[$i][0]->exemplar);
     		$fpdf->Cell(0,5, $v4[$i][0]->nome_livro);
			$fpdf->Cell(0,5, $data,'','','R');
			$fpdf->Ln();
     }
       
		$fpdf->Ln(5);
		$fpdf->Cell(0,10,'______________________________','','','C');
		$fpdf->Ln();
		$fpdf->Cell(0,0,$v2->nome,'','','C');
		$fpdf->Ln(15);
		$fpdf->Cell(0,0,'Usuario: '.$v3->nome);
		$fpdf->Ln(10);
		 $fpdf->Cell(0,0,'*****************************************************','','','C');
		$fpdf->Output();
        exit;
	}

public function getDevolvendo($id){
		
		$devolver = TabelaExemEmp::find($id) ;
		
		$devolver->devolvido = 1;
		
		$devolver->save();
		
		$devo = DB::table('exem-emp')->where('id', '=', $id)->first();
		
		$baixa = TabelaExemplar::find($devo->exemplar);

		$baixa->emprestado= 0;
		$baixa->save();

		return Redirect:: to('emprestimo');
	}




}
