<?php

class UsuarioController extends BaseController {

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
private $rules = array('nome' =>  'required', 'cpf' =>array( 'cpf', 'required'), 'rg' =>'required', 'endereco' =>'required',
					   'estado' =>'required', 'telefone' =>'required', 'cidade' =>'required', 'email' =>'required', 
					   'senha' =>'required');

	public function getIndex(){
		$lista2 = TabelaUsuario::get();
		return View::make ('ListarUsuario', compact('lista2'));
	
	}

	public function getAdicionar(){
		return View::make('EditorUsuario');
	}

	public function postAdicionar(){
		
		$usuario = new TabelaUsuario();
		$usuario->nome = Input::get('nome');
		$usuario->cpf = Input::get('cpf');
		$usuario->rg = Input::get('rg');
		$usuario->endereco = Input::get('endereco');
		$usuario->estado = Input::get('estado');
		$usuario->telefone = Input::get('telefone');
		$usuario->cidade = Input::get('cidade');
		$usuario->email = Input::get('email');
		$usuario->senha = Hash::make(Input::get('senha'));
		$usuario->login = 'null';
		$valida = Validator::make($usuario->toArray(), $this->rules);
		
		if($valida->fails()){
			return Redirect::to('usuario/adicionar')
			->withErrors($valida)
			->withInput();
		} 
		$usuario->save();

		return Redirect::to('usuario');
	}

	public function getEditar($id){
		$usuarios = DB::table('usuario')->where('id', $id)->get();
		$usuarios = $usuarios[0];

				return View::make('EditorUsuario', compact('usuarios')) ;
	}

	public function postEditar($id){
		$dados = Input::all();
		$usuario = TabelaUsuario::find($id);
		$usuario->nome = Input::get('nome');
		$usuario->cpf = Input::get('cpf');
		$usuario->rg = Input::get('rg');
		$usuario->endereco = Input::get('endereco');
		$usuario->estado = Input::get('estado');
		$usuario->telefone = Input::get('telefone');
		$usuario->cidade = Input::get('cidade');
		$usuario->email = Input::get('email');
		$usuario->senha = Hash::make(Input::get('senha'));
		$usuario->login = Input::get('login');

		$valida = Validator::make($usuario->toArray(), $this->rules);
		
		if($valida->fails()){
			return Redirect::to("usuario/editar/{$id}")
			->withErrors($valida)
			->withInput();
		} 
		
		$usuario->save();

		return Redirect::to('usuario');
	}

	public function getDeletar($id){
		$deletar = TabelaUsuario::find($id) ;
		$deletar->delete();

		return Redirect:: to('usuario');
	}

	public function MissingMethod($params = array()){
		return 'Nada encontrado :D';
	}

	public function listar() {
		
		//criando regras de validação
	   $regras = array('lst_busca' => 'required');
	   
	   //executando validação
	   $validacao = Validator::make(Input::all(), $regras);
	   
	   //se a validação deu errado
	   if ($validacao->fails()) {
		   return Redirect::to('usuario/cadastro')->withErrors($validacao);
	   }else{
		   $buscar = Input::get('lst_busca');
           $buscaResultado = TabelaUsuario::where('nome', 'like', '%'.$buscar.'%')->get();
		                
           return View::make('ListarUsuario')->with('ListarUsuario', $buscaResultado);

       }}

    	public function postIndex(){
    		$buscado = Input::get('lst_busca');
    		$lista2 = TabelaUsuario::where('nome', 'like', '%'.$buscado.'%')->get();
    		return View::make('ListarUsuario', compact('lista2')) ;
    }

    public function getPdf(){
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

}
