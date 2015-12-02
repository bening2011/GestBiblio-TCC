@extends('templates.template')

@section('content')
<h1>Listar Emprestimos</h1>

	<div class="row">
<div  class= "col-md-4"  >
  {{Form::open(array('url' => 'emprestimo'))}}
  {{Form::text('lst_busca', '' , array('placeholder' =>'Buscar Emprestimo', 'class'=> 'form-control '))}}
 
</div>
 {{Form::submit('Buscar', array('class'=> 'btn btn-default '))}}
  {{Form::close()}}
  
  <div class="col-md-1 pull-right ">
	<a href="emprestimo/devolucao">   
	<input class="btn btn-primary" type="submit" value="Devolução">
	</a>
</div>
<div class="pull-right ">
	<a href="emprestimo/adicionar">   
	<input class="btn btn-primary" type="submit" value="Novo Emprestimo">
	</a>
</div>
  </div>

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
 			<td>{{{date("d-m-Y",strtotime(str_replace('/','-',$emprestimo->data_emprestimo)))}}}</td>
 			<td>{{{date("d-m-Y",strtotime(str_replace('/','-',$emprestimo->data_provavel_devolucao)))}}}</td>
 			<td> {{{$emprestimo->pendente}}} pendente(s)</td>
		</tr>
		@empty
		<tr>
				<td align="center" colspan="12">Nenhum Dado</td>
		</tr>		
		 @endforelse
	</table>
@stop