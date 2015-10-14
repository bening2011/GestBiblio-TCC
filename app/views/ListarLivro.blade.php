@extends('templates.template')

@section('content')
Listar Livros
{{HTML::link('livro/adicionar','Novo Cadastro')}}
	<table border="1">
 		<tr>
 			
 			<th>Nome do Livro</th>
 			<th>Nome Autor</th>
 			<th>Edição</th>
 			<th>Nome da Editora</th>
 			<th>Ano</th>
 			<th>Data de Entrada</th>
 			<th>Seção</th>
 			<th>Ações</th>
		</tr>
		@forelse ($lista3 as $livro)
		<tr>
 			<td>{{{$livro->nome_livro}}}</td>
 			<td>{{{$livro->nome_autor}}}</td>
 			<td>{{{$livro->edicao}}}</td>
 			<td>{{{$livro->nome_editora}}}</td>
 			<td>{{{$livro->ano}}}</td>
 			<td>{{{$livro->dara_entrada}}}</td>
 			<td>{{{$livro->secao}}}</td>
 			<td>{{HTML::link("livro/editar/{$livro->id_livro}",'Editar')}} / 
 				{{HTML::link("livro/deletar/{$livro->id_livro}",'Deletar')}}	</td>
		</tr>
		@empty
		<tr>
				<td align="center" colspan="8">Nenhum Dado</td>
		</tr>		
		 @endforelse
	</table>
@stop