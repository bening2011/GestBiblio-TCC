<?php

class RelatorioController extends BaseController{

	public function getIndex(){
		$TR = array('1' => 'Clientes' ,
					'2' => 'Usuarios' ,
					'3' => 'Emprestimos' ,
					'4' => 'Livros' ,
					'5' => 'Exemplares'
					 );
		return View::make ('relatorio', compact('TR'));
	}
		public function Header()
		{
		$this->Image('C:\wamp\www\GestB\vendor\anouar\fpdf\src\Anouar\Fpdf\bibliogest-pdf.png',100,6,80);
		
	
    
    	$this->Ln(15);
		}
	
	public function postIndex(){
		$tipo= Input::get('Tipo');
		
		if($tipo == '1'){

			$clientes = TabelaCliente::get();
    

    $fpdf = new relatorio('L','mm','A4');
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',14);
        $i=0;
        $fpdf->Ln(15);
        $fpdf->Cell(40,10,utf8_decode('Nome'));
        $fpdf->Cell(40,10,utf8_decode('Pai'));
        $fpdf->Cell(45,10,utf8_decode('Mãe'));
        $fpdf->Cell(75,10,utf8_decode('Endereço'));
        $fpdf->Cell(28,10, utf8_decode('Telefone'));
        $fpdf->Cell(23,10,utf8_decode('E-Mail'), 0, 1, 'C');
        $fpdf->Ln(0);
        

        $fpdf->SetFont('Arial','',10);
       foreach ($clientes as  $cliente) {
          $fpdf->Cell(40,10, utf8_decode($cliente->nome));
          $fpdf->Cell(40,10, utf8_decode($cliente->nome_pai));
          $fpdf->Cell(45,10, utf8_decode($cliente->nome_mae));
          $fpdf->Cell(75,10, utf8_decode($cliente->endereco));
          $fpdf->Cell(28,10, utf8_decode($cliente->telefone));

          $fpdf->Cell(35,10, utf8_decode($cliente->email), 0, 1, 'L');
          
       }
     $fpdf->Output();
        exit;


		}
		if($tipo == '2'){

			$usuarios = TabelaUsuario::get();
		

		$fpdf = new relatorio('L','mm','A4');
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',14);
        $i=0;
        $fpdf->Ln(15);
        $fpdf->Cell(75,10,utf8_decode('Nome'));
        $fpdf->Cell(52,10,utf8_decode('CPF'));
        $fpdf->Cell(65,10,utf8_decode('Telefone'));
        $fpdf->Cell(23,10,utf8_decode('E-Mail'), 0, 1, 'C');
        $fpdf->Ln(0);
        

        $fpdf->SetFont('Arial','',14);
       foreach ($usuarios as  $usuario) {
       		$fpdf->Cell(75,10, utf8_decode($usuario->nome));
       		$fpdf->Cell(50,10, utf8_decode($usuario->cpf));
       		$fpdf->Cell(45,10, utf8_decode($usuario->telefone));
       		$fpdf->Cell(35,10, utf8_decode($usuario->email), 0, 1, 'L');
       		
       }
		 $fpdf->Output();
        exit;

		}
		if($tipo == '3'){

			$emprestimo = DB::table('emprestimo')->join
                    ('cliente', 'emprestimo.id_clientedois', '=', 'cliente.id_cliente')->select
                    ('emprestimo.id_emprestimo', 'cliente.nome', 'emprestimo.data_provavel_devolucao', 'emprestimo.data_emprestimo')->get();
		  
     
                     
		    $fpdf = new relatorio('L','mm','A4');
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',14);
        
        $fpdf->Ln(15);
        $fpdf->Cell(15,10,utf8_decode('ID'));
        $fpdf->Cell(40,10,utf8_decode('Cliente'));
        $fpdf->Cell(30,10,utf8_decode('Data Emp.'));
        //$fpdf->Cell(50,10,utf8_decode(''));
        //$fpdf->Cell(70,10,utf8_decode('Endereço'));
        //$fpdf->Cell(35,10,utf8_decode('Cidade'));
        $fpdf->Cell(60,10,utf8_decode('Data P/ Devolução'));
        $fpdf->Cell(10,10,utf8_decode('Livro(s)'), 0, 1, 'L');
        $fpdf->Ln(10);
        

        $fpdf->SetFont('Arial','',9);
       foreach ($emprestimo as  $emprest) {
       		       
      $v4 = TabelaExemEmp::join('livro', 'exem-emp.livro', '=','id_livro')
                  ->select('exem-emp.exemplar','nome_livro', 'exem-emp.emprestimo')
                  ->where('emprestimo', '=' ,$emprest->id_emprestimo)
                  ->get();
          if($v4 =! 0){   
          $fpdf->Cell(15,10, utf8_decode($emprest->id_emprestimo));
       		$fpdf->Cell(40,10, utf8_decode($emprest->nome));
       		$fpdf->Cell(30,10, utf8_decode(date("d-m-Y",strtotime(str_replace('/','-',$emprest->data_emprestimo)))));
          $fpdf->Cell(60,10, utf8_decode(date("d-m-Y",strtotime(str_replace('/','-',$emprest->data_provavel_devolucao)))));
       		foreach ($v4 as $livro) {
            $fpdf->Cell(8,10, utf8_decode($livro->exemplar));
            $fpdf->Cell(30,10, utf8_decode($livro->nome_livro));
          }
       		$fpdf->Ln();
       		}
       }
		 $fpdf->Output();
        exit;

		}
    if($tipo == '4'){

      $livros = TabelaLivro::get();
    

    $fpdf = new relatorio('L','mm','A4');
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',14);
        $i=0;
        $fpdf->Ln(15);
        $fpdf->Cell(65,10,utf8_decode('Livro'));
        $fpdf->Cell(61,10,utf8_decode('Autor'));
        $fpdf->Cell(22,10,utf8_decode('Seção'));
        $fpdf->Cell(26,10,utf8_decode('Edição'));
        $fpdf->Cell(28,10,utf8_decode('Editora'));
        $fpdf->Cell(34,10,utf8_decode('Entrada'));
        $fpdf->Cell(30,10,utf8_decode('Ano'), 0, 1, 'L');
        $fpdf->Ln(10);
        

        $fpdf->SetFont('Arial','',12);
       foreach ($livros as  $livro) {
          $fpdf->Cell(65,10, utf8_decode($livro->nome_livro));
          $fpdf->Cell(65,10, utf8_decode($livro->nome_autor));
          $fpdf->Cell(20,10, utf8_decode($livro->secao));
          $fpdf->Cell(25,10, utf8_decode($livro->edicao));
          $fpdf->Cell(25,10, utf8_decode($livro->nome_editora));
          $fpdf->Cell(35,10, utf8_decode($livro->data_entrada));
          $fpdf->Cell(30,10, utf8_decode($livro->ano), 0, 1, 'L');
          
       }
     $fpdf->Output();
        exit;
      }
      if($tipo == '5'){

      $exemplares = TabelaExemplar::join('livro', 'exemplar.id_livrodois', '=','id_livro')
                                    ->select('exemplar.id_exemplar','nome_livro','exemplar.estado_livro','exemplar.emprestado')->get();


    $fpdf = new relatorioR('P','mm','A4');
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',14);
        $i=0;
        $fpdf->Ln(15);

        $fpdf->Cell(40,10,utf8_decode('N° Exemplar'));
         $fpdf->Cell(65,10, utf8_decode('Livro'));
        $fpdf->Cell(50,10,utf8_decode('Condição'));
        $fpdf->Cell(20,10,utf8_decode('Emprestado'), 0, 1, 'L');
        $fpdf->Ln(10);
        

        $fpdf->SetFont('Arial','',12);
       foreach ($exemplares as  $livro) {
          $fpdf->Cell(40,10, utf8_decode($livro->id_exemplar));
          $fpdf->Cell(65,10, utf8_decode($livro->nome_livro));
          $fpdf->Cell(50,10, utf8_decode($livro->estado_livro));
          $emprestado = '';
          if($livro->emprestado == 1){
            $emprestado= 'Sim';
          }
          else{
            $emprestado= 'Não';
          }
          $fpdf->Cell(30,10, utf8_decode($emprestado), 0, 1, 'L');
          
       }
     $fpdf->Output();
        exit;
      }
	}



	
}
