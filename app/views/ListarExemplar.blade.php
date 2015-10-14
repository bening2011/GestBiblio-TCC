@extends('templates.template')

@section('content')
Listar Exemplares
{{HTML::link('exemplar/adicionar','Novo Cadastro')}}

	<table class="table table-striped">
 		<tr>
 			<th>Numero Exemplar</th>
 			<th>Nome do Livro</th>
 			<th>Condição Livro</th>
 			<th>Emprestado</th>
 			<th>Ações</th>
		</tr>
		@forelse ($lista4 as $exemplar)
		<tr>
 			<td>{{{$exemplar->id_exemplar}}}</td>
 			<td>{{{$exemplar->nome_livro}}}</td>
 			<td>{{{$exemplar->estado_livro}}}</td>
 			<td>{{{$exemplar->emprestado}}}</td>
 			<td>{{HTML::link("exemplar/editar/{$exemplar->id_exemplar}",'Editar')}} / 
 				{{HTML::link("exemplar/deletar/{$exemplar->id_exemplar}",'Deletar')}}	</td>
		</tr>
		@empty
		<tr>
				<td align="center" colspan="12">Nenhum Dado</td>
		</tr>		
		 @endforelse
	</table>
@stop