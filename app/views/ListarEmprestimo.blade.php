@extends('templates.template')

@section('content')
Listar Emprestimos
{{HTML::link('emprestimo/adicionar','Novo Emprestimo')}}

	<table class="table table-striped">
 		<tr>
 			<th>Emprestimo</th>
 			<th>Cliente</th>
 			<th>Data Emprestimo</th>
 			<th>Data Para Devolução</th>
 			<th>Devolução</th>
		</tr>
		@forelse ($lista5 as $emprestimo)
		<tr>
 			<td>{{{$emprestimo->id_emprestimo}}}</td>
 			<td>{{{$emprestimo->nome}}}</td>
 			<td>{{{$emprestimo->data_emprestimo}}}</td>
 			<td>{{{$emprestimo->data_devolucao}}}</td>
 			<td>{{HTML::link("emprestimo/editar/{$emprestimo->id_emprestimo}",'Editar')}} / 
 				{{HTML::link("emprestimo/deletar/{$emprestimo->id_emprestimo}",'Deletar')}}	</td>
		</tr>
		@empty
		<tr>
				<td align="center" colspan="12">Nenhum Dado</td>
		</tr>		
		 @endforelse
	</table>
@stop