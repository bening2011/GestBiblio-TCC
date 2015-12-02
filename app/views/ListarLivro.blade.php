@extends('templates.template')

@section('content')
<h1>Listar Livros</h1>

	<div class="row">
<div  class= "col-md-4"  >
  {{Form::open(array('url' => 'livro'))}}
  {{Form::text('lst_busca', '' , array('placeholder' =>'Buscar Livros', 'class'=> 'form-control '))}}
 
</div>
 {{Form::submit('Buscar', array('class'=> 'btn btn-default '))}}
  {{Form::close()}}
  
 
<div class="pull-right ">
	<a href="livro/adicionar">   
	<input class="btn btn-primary" type="submit" value="Cadastrar Livro">
	</a>
</div>
  </div>

	<table class="table table-striped">
 		<tr>
 			
 			<th>Nome do Livro</th>
 			<th>Nome Autor</th>
 			
 			<th>Nome da Editora</th>
 			
 			
 			<th>Seção</th>
 			<th>Ações</th>
		</tr>
		@forelse ($lista3 as $livro)
		<tr>
 			<td>{{{$livro->nome_livro}}}</td>
 			<td>{{{$livro->nome_autor}}}</td>
 			
 			<td>{{{$livro->nome_editora}}}</td>
 			
 			
 			<td>{{{$livro->secao}}}</td>
 			<td><a href="usuario/editar/{{{$livro->id_livro}}}" title="Editar"><span class='glyphicon glyphicon-pencil'></span></a>
 				
 				<a href="usuario/deletar/{{{$livro->id_livro}}}" title="Deletar"><span class='glyphicon glyphicon-trash'></span></a>	</td>
 			
		</tr>
		@empty
		<tr>
				<td align="center" colspan="8">Nenhum Dado</td>
		</tr>		
		 @endforelse
	</table>
	
@stop