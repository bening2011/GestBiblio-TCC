<?php

class FpdfController extends BaseController {

	

	public function getIndex(){
		
		$usuarios = TabelaUsuario::get();
		

		$fpdf = new Fpdf('L','mm','A4');
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',14);
        $i=0;
        $fpdf->Ln(15);
        $fpdf->Cell(55,10,'<h1>Nome</h1>');
        $fpdf->Cell(52,10,'CPF');
        $fpdf->Cell(65,10,'Telefone');
        $fpdf->Cell(23,10,'E-Mail');
        $fpdf->Cell(100,10,'Login', 0, 1, 'C');
        $fpdf->Ln(10);
        

        $fpdf->SetFont('Arial','',14);
       foreach ($usuarios as  $usuario) {
       		$fpdf->Cell(55,10, $usuario->nome);
       		$fpdf->Cell(50,10, $usuario->cpf);
       		$fpdf->Cell(45,10, $usuario->telefone);
       		$fpdf->Cell(35,10, $usuario->email);
       		$fpdf->Cell(120,10, $usuario->login, 0, 1, 'C');
       		
       }
		 $fpdf->Output();
        exit;
	}

	public function getPdf(){
        $dt = new DateTime();
        $pdf = App::make('dompdf');
		$pdf->loadHTML('
			<html>
					<style>
					.style2 {
					font-size: 30px ;
					
					}
					</style>
					
					<div align="center"><font size="1">***********************************************<br><br>
																COMPROVANTE DE EMPRESTIMO<br>
																GestBiblio - Sistema de Gestão de Bibliotecas<br>											
					</font></div>
					<div size="1" align="left"><font size="1">Data:<script type="text/php">print_r($today = date("j, n, Y"))</script></font></div>
					

</html>
');
		return $pdf->stream();
	}

	public function postAdicionar(){
		$pdf = new TCPDF();
 		$pdf->SetCreator(PDF_CREATOR);
 		$pdf->SetAuthor('GestBiblio - Sistema de Gestão de Bibliotecas');
 		$pdf->SetTitle('Comprovante de Imprestimo');
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $html = '';
        $pdf->Text(90, 140, 'This is a test');
        $filename = storage_path() . '/test.pdf';
        $pdf->output($filename, 'F');
 
        return Response::view($filename);

	}

	public function getEditar(){
		
	}

	public function postEditar(){
		
	}

	public function getDeletar(){
		
	}

	public function MissingMethod($params = array()){
		return 'Nada encontrado :D';
	}

	public function getListar()
	{
		

	}

}
