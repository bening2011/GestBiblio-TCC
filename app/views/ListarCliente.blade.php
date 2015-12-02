@extends('templates.template')

@section('content')
<h1>Listar Clientes</h1>

	<div class="row">
<div  class= "col-md-4"  >
  {{Form::open(array('url' => 'cliente'))}}
  {{Form::text('lst_busca', '' , array('placeholder' =>'Buscar Clientes', 'class'=> 'form-control '))}}
 
</div>
 {{Form::submit('Buscar', array('class'=> 'btn btn-default '))}}
  {{Form::close()}}
  
 
<div class="pull-right ">
	<a href="cliente/adicionar">   
	<input class="btn btn-primary" type="submit" value="Cadastrar Cliente">
	</a>
</div>
  </div>
	<div class="table-responsive">
	<table class="table table-striped">
 		<tr>
 			<th>Nome</th>
 			<th>Nome Pai</th>
 			<th>Nome Mãe</th>
 			<th>Escola</th>
 			<th>Endereço</th>
 			<th>Cidade</th>
 			<th>Estado</th>
 			<th>Email</th>
 			<th>Email Pais</th>
 			<th>Email Escola</th>
 			<th>Telefone</th>
 			<th>Ações</th>
		</tr>
		@forelse ($lista as $cliente)
		<tr>
 			<td>{{{$cliente->nome}}}</td>
 			<td>{{{$cliente->nome_pai}}}</td>
 			<td>{{{$cliente->nome_mae}}}</td>
 			<td>{{{$cliente->escola}}}</td>
 			<td>{{{$cliente->endereco}}}</td>
 			<td>{{{$cliente->cidade}}}</td>
 			<td>{{{$cliente->estado}}}</td>
 			<td>{{{$cliente->email}}}</td>
 			<td>{{{$cliente->email_pais}}}</td>
 			<td>{{{$cliente->email_escola}}}</td>
 			<td>{{{$cliente->telefone}}}</td>
 			<td><a href="cliente/editar/{{{$cliente->id_cliente}}}" title="Editar"><span class='glyphicon glyphicon-pencil'></span></a>
 				
 				<a href="cliente/deletar/{{{$cliente->id_cliente}}}" title="Deletar"><span class='glyphicon glyphicon-trash'></span></a>	
 					</td>
		</tr>
		@empty
		<tr>
				<td align="center" colspan="12">Nenhum Dado</td>
		</tr>		
		 @endforelse
	</table>
	
</div>
<br>

@stop