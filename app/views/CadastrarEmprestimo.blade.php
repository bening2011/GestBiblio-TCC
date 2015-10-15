@extends('templates.template')

@section('content')

 			<h1>Cadastrar Novo Emprestimo</h1>
 	@if (count($errors) > 0)
 		<div class="alert alert-danger">
 		@foreach($errors->all() as $mensagem)
 		<p>{{$mensagem}}</p>
 		@endforeach
 		</div>
 	@endif
	
<div  class= "col-xs-6 "  >
 			{{Form::open(array('url' => 'emprestimo/adicionar'))}}
<div class= "dropdown btn btn-default dropdown-toggle">
 		{{ Form::select('id_cliente', ($clientes)) }}
 		</div>
 		{{"<BR>"}}
		
 		
 		{{ Form::select('id_cliente', $exemplares) }} 
 		{{"<BR>"}}
 		
 		{{Form::text('data_emprestimo','', array('placeholder' =>'Data do Emprestimo', 'class'=> 'form-control'))}}{{"<BR>"}}
 		
 		{{Form::text('data_provavel_devolucao','', array('placeholder' =>'Data Devolução', 'class'=> 'form-control'))}}{{"<BR>"}}
 		
 		{{Form::submit('Submeter')}}
 	{{Form::close()}}
 	</div>
@stop