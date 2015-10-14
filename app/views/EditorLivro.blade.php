@extends('templates.template')

@section('content')
 	@if ( isset($livros->id_livros) )
 			<h1>Editar Livro</h1>
 		@else
 			<h1>Cadastrar Novo Livro</h1>
 		@endif
 	@if (count($errors) > 0)
 		@foreach($errors->all() as $mensagem)
 		<p>{{$mensagem}}</p>
 		@endforeach
 	@endif

 	@if ( isset($livros->id_livro) )
 			{{Form::open(array('url' => "livro/editar/$livros->id_livro"))}}
 		@else
 			{{Form::open(array('url' => 'livro/adicionar'))}}
 		@endif
 		{{Form::text('nome_livro', isset($livros->nome_livro) ? $livros->nome_livro :'', array('placeholder' =>'Nome do Livro'))}}
 			{{"<BR>"}}
 		{{Form::text('nome_autor', isset($livros->nome_autor) ? $livros->nome_autor :'', array('placeholder' =>'Nome do Autor'))}}
 			{{"<BR>"}}
 		{{Form::text('edicao', isset($livros->edicao) ? $livros->edicao :'', array('placeholder' =>'Edição'))}}
 			{{"<BR>"}}
 		{{Form::text('nome_editora', isset($livros->nome_editora) ? $livros->nome_editora :'', array('placeholder' =>'Nome da Editora'))}}
 			{{"<BR>"}}
 		{{Form::text('ano', isset($livros->ano) ? $livros->ano :'', array('placeholder' =>'Ano'))}}
 			{{"<BR>"}}
 		{{Form::text('data_entrada', isset($livros->data_entrada) ? $livros->data_entrada :'', array('placeholder' =>'Data de Entrada'))}}
 			{{"<BR>"}}
 		{{Form::text('secao', isset($livros->secao) ? $livros->secao :'', array('placeholder' =>'Seção'))}}
 			{{"<BR>"}}
 			{{"<BR>"}}
 		{{Form::submit('Submeter')}}
 	{{Form::close()}}
@stop