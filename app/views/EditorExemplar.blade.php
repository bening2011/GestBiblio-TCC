@extends('templates.template')

@section('content')
	@if ( isset($exemplares->id_exemplar) )
 			<h1>Editar Exemplar</h1>
 		@else
 			<h1>Cadastrar Novo Exemplar</h1>
 		@endif
 	@if (count($errors) > 0)
 		@foreach($errors->all() as $mensagem)
 		<p>{{$mensagem}}</p>
 		@endforeach
 	@endif
	
		@if ( isset($exemplares->id_exemplar) )
 			{{Form::open(array('url' => "exemplar/editar/$exemplares->id_exemplar"))}}
 		@else
 			{{Form::open(array('url' => 'exemplar/adicionar'))}}
 		@endif
 		Livro: 
 		<label>{{{$exemplares->nome_livro}}}</label>
 		{{"<BR>"}}
 		
 		{{Form::select('estado_livro', isset($exemplares->estado_livro) ? $exemplares->estado_livro :'', array('placeholder' =>'Condição do Livro'))}}{{"<BR>"}}
 		{{Form::text('emprestado', isset($exemplares->emprestado) ? $exemplares->emprestado :'', array('placeholder' =>'Emprestado'))}}{{"<BR>"}}
 		{{Form::submit('Submeter')}}
 	{{Form::close()}}
@stop