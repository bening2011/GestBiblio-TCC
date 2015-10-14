@extends('templates.template')

@section('content')
{{HTML::link("usuario/adicionar",'Adicionar Novo Usuario')}}{{"<BR>"}}
Listar Usuarios


  {{Form::open(array('url' => 'usuario'))}}
  {{Form::text('lst_busca', '' , array('placeholder' =>'Buscar Usuario'))}}
  {{Form::submit('Submeter')}}
  {{Form::close()}}
</form>
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
 			<th>Login</th>
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
 			<td>{{{$usuario->login}}}</td>
 			<td>******</td>
 			<td><a href="usuario/editar/{{{$usuario->id_usuario}}}" title="Editar"><span class='glyphicon glyphicon-pencil'></span></a>
 				
 				<a href="usuario/deletar/{{{$usuario->id_usuario}}}" title="Editar"><span class='glyphicon glyphicon-trash'></span></a>	</td>
		</tr>
		</tr>
		@empty
		<tr>
				<td align="center" colspan="11">Nenhum Dado</td>
		</tr>	
		 @endforelse
	</table>
@stop