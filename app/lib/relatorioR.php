<?php

class relatorioR extends Fpdf
{
//Aqui sobrescrevemos o header
//original do fpdf
function header()
{
$this->Image('vendor\anouar\fpdf\src\Anouar\Fpdf\bibliogest-pdf.png',63,6,80);
	//$this->Image('C:\wamp\www\GestB\vendor\anouar\fpdf\src\Anouar\Fpdf\bibliogest-pdf.png',18,7,45);
	
    
    $this->Ln(15);

}

//Rodapé
function footer()
{
$this->SetY(-15);

 
      $this->SetFont('Arial','I',10);
      $usuario = TabelaUsuario::find(Auth::id());
      date_default_timezone_set("America/Halifax");
    
    $this->Cell(0,10,'Pagina '.$this->PageNo().'',0,0,'C');
    $this->ln(0);
    $this->Cell(0,10,utf8_decode('Usuario: '.$usuario->nome));
    $this->ln(0);
    $this->Cell(0,10,utf8_decode('Data: '.date("d-m-Y H:i:s")),0,1,'R');

}
}