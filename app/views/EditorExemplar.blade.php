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
 		
 		{{Form::select('20', 
 			array(

 					isset($exemplares[0]->id_livrodois) ? $exemplares->id_livrodois :
 					 	  isset($livros[0]->nome_livro) ? $livros[0]->nome_livro : 'Erro1'
 					 	  =>isset($livros[0]->nome_livro) ? $livros[0]->nome_livro : 'Erro2', 

 					 	  
 					isset($exemplares->id_livrodois) ? $exemplares->id_livrodois :
 					 	  isset($livros[0]->nome_livro) ? $livros[0]->nome_livro : 'Erro3'
 					 	  =>isset($livros[0]->nome_livro) ? $livros[0]->nome_livro : 'Erro4',
 				))
 		}}{{"<BR>"}}
 		
 		{{Form::text('estado_livro', isset($exemplares->estado_livro) ? $exemplares->estado_livro :'', array('placeholder' =>'Condição do Livro'))}}{{"<BR>"}}
 		{{Form::text('emprestado', isset($exemplares->emprestado) ? $exemplares->emprestado :'', array('placeholder' =>'Emprestado'))}}{{"<BR>"}}
 		{{Form::submit('Submeter')}}
 	{{Form::close()}}
@stop