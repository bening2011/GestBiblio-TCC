@extends('templates.template')

@section('content')

 			<h1>Cadastrar Novo Exemplar</h1>
 	@if (count($errors) > 0)
 		@foreach($errors->all() as $mensagem)
 		<p>{{$mensagem}}</p>
 		@endforeach
 	@endif
	
		
 			{{Form::open(array('url' => 'exemplar/adicionar'))}}

 		{{ Form::select('id_livrodois', $livros) }}
 		
 		{{"<BR>"}}

 	

 		{{Form::text('estado_livro','', array('placeholder' =>'Condição do Livro'))}}{{"<BR>"}}
 		{{Form::text('emprestado', isset($exemplares->emprestado) ? $exemplares->emprestado :'', array('placeholder' =>'Emprestado'))}}{{"<BR>"}}
 		{{Form::submit('Submeter')}}
 	{{Form::close()}}
 	
@stop