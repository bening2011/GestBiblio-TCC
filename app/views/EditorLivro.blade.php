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
<div  class= "col-xs-6 "  >
 	@if ( isset($livros->id_livro) )
 			{{Form::open(array('url' => "livro/editar/$livros->id_livro"))}}
 		@else
 			{{Form::open(array('url' => 'livro/adicionar'))}}
 		@endif
 		<label>Nome do Livro</label>
 		{{Form::text('nome_livro', isset($livros->nome_livro) ? $livros->nome_livro :'', array('placeholder' =>'Nome do Livro', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		<label>Nome do Autor</label>
 		{{Form::text('nome_autor', isset($livros->nome_autor) ? $livros->nome_autor :'', array('placeholder' =>'Nome do Autor', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		<label>Nome da Editora</label>
 		{{Form::text('nome_editora', isset($livros->nome_editora) ? $livros->nome_editora :'', array('placeholder' =>'Nome da Editora', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		
 		<label>Seção</label>
 		{{Form::text('secao', isset($livros->secao) ? $livros->secao :'', array('placeholder' =>'Seção', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			{{"<BR>"}}
 		{{Form::submit('Submeter', array('class'=> 'btn btn-default'))}}
 	{{Form::close()}}
 </div>
@stop