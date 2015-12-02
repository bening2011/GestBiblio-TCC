@extends('templates.template')

@section('content')


<h1>Listar Exemplar</h1>

	<div class="row">
<div  class= "col-md-4"  >
  {{Form::open(array('url' => 'exemplar'))}}
  {{Form::text('lst_busca', '' , array('placeholder' =>'Buscar Exemplar', 'class'=> 'form-control '))}}
 
</div>
 {{Form::submit('Buscar', array('class'=> 'btn btn-default '))}}
  {{Form::close()}}
  
 
<div class="pull-right ">
	<a href="exemplar/adicionar">   
	<input class="btn btn-primary" type="submit" value="Cadastrar Exemplar">
	</a>
</div>
  </div>
	<table class="table table-striped">
 		<tr>
 			<th>N° Exemplar</th>
 			<th>Nome do Livro</th>
 			<th>Condição Livro</th>
 			<th>Edição</th>
			<th>Ano</th>
			<th>Data de Entrada</th>
 			<th>Emprestado</th>

 			<th>Ações</th>
		</tr>
		@forelse ($lista4 as $exemplar)
		<tr>
 			<td>{{{$exemplar->id_exemplar}}}</td>
 			<td>{{{$exemplar->nome_livro}}}</td>
 			<td>{{{$exemplar->estado_livro}}}</td>
 			<td>{{{$exemplar->edicao}}}</td>
			<td>{{{$exemplar->ano}}}</td>
			<td>{{{date("d-m-Y",strtotime(str_replace('/','-',$exemplar->data_entrada)))}}}</td>
 			<td>{{{$exemplar->emprestado}}}</td>
 			<td><a href="exemplar/editar/{{{$exemplar->id_exemplar}}}" title="Editar"><span class='glyphicon glyphicon-pencil'></span></a>
 				
 				<a href="exemplar/deletar/{{{$exemplar->id_exemplar}}}" title="Deletar"><span class='glyphicon glyphicon-trash'></span></a>	</td>
 			
		</tr>
		@empty
		<tr>
				<td align="center" colspan="12">Nenhum Dado</td>
		</tr>		
		 @endforelse
	</table>
@stop