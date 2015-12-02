@extends('templates.template')

@section('content')
<h1>Listar Usuários</h1>

	<div class="row">
<div  class= "col-md-4"  >
  {{Form::open(array('url' => 'usuario'))}}
  {{Form::text('lst_busca', '' , array('placeholder' =>'Buscar Usuários', 'class'=> 'form-control '))}}
 
</div>
 {{Form::submit('Buscar', array('class'=> 'btn btn-default '))}}
  {{Form::close()}}
  
 
<div class="pull-right ">
	<a href="usuario/adicionar">   
	<input class="btn btn-primary" type="submit" value="Cadastrar Usuário">
	</a>
</div>
  </div>

	<table class="table table-striped">
 		<tr>
 			<th>Nome</th>
 			<th>CPF</th>
 			<th>RG</th>
 			<th>Endereço</th>
 			<th>Estado</th>
 			<th>Telefone</th>
 			<th>Cidade</th>
 			<th>Email</th>
 			<th>Senha</th>
 			<th>Ações</th>
		</tr>
		
		@forelse ($lista2 as $usuario)
		<tr>
 			<td>{{{$usuario->nome}}}</td>
 			<td>{{{$usuario->cpf}}}</td>
 			<td>{{{$usuario->rg}}}</td>
 			<td>{{{$usuario->endereco}}}</td>
 			<td>{{{$usuario->estado}}}</td>
 			<td>{{{$usuario->telefone}}}</td>
 			<td>{{{$usuario->cidade}}}</td>
 			<td>{{{$usuario->email}}}</td>
 			<td>******</td>
 			<td><a href="usuario/editar/{{{$usuario->id}}}" title="Editar"><span class='glyphicon glyphicon-pencil'></span></a>
 				
 				<a href="usuario/deletar/{{{$usuario->id}}}" title="Editar"><span class='glyphicon glyphicon-trash'></span></a>	</td>
		</tr>
		</tr>
		@empty
		<tr>
				<td align="center" colspan="11">Nenhum Dado</td>
		</tr>	
		 @endforelse
	</table>
	
	
@stop