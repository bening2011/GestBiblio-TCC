@extends('templates.template')

@section('content')
 	@if ( isset($usuarios->id_usuario) )
 			<h1>  Editar Usuario</h1>
 		@else
 			<h1>  Cadastrar Novo Usuario</h1>
 		@endif

 	@if (count($errors) > 0)
 		<div class="alert alert-danger">
 			@foreach($errors->all() as $mensagem)
 				<p>{{$mensagem}}</p>

 			@endforeach
 		</div>
 	@endif
<div  class= "col-xs-6 "  >
 	@if ( isset($usuarios->id_usuario) )
 			{{Form::open(array('url' => "usuario/editar/$usuarios->id_usuario"))}}
 		@else
 			{{Form::open(array('url' => 'usuario/adicionar'))}}
 		@endif
 		{{Form::text('nome', isset($usuarios->nome) ? $usuarios->nome :'', array('placeholder' =>'Nome', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::text('cpf', isset($usuarios->cpf) ? $usuarios->cpf :'', array('placeholder' =>'CPF', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::text('rg', isset($usuarios->rg) ? $usuarios->rg :'', array('placeholder' =>'RG', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::text('endereco', isset($usuarios->endereco) ? $usuarios->endereco :'', array('placeholder' =>'Endereço', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::text('estado', isset($usuarios->estado) ? $usuarios->estado :'', array('placeholder' =>'Estado', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::text('telefone', isset($usuarios->telefone) ? $usuarios->telefone :'', array('placeholder' =>'Telefone', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::text('cidade', isset($usuarios->cidade) ? $usuarios->cidade :'', array('placeholder' =>'Cidade', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::text('email', isset($usuarios->email) ? $usuarios->email :'', array('placeholder' =>'Email', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::text('login', isset($usuarios->login) ? $usuarios->login :'', array('placeholder' =>'Login', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		{{Form::password('senha',  array('placeholder' =>'Senha', 'class'=> 'form-control'))}}
 			{{"<BR>"}}{{"<BR>"}}
 		{{Form::submit('Submeter', array('class'=> 'btn btn-default'))}}
 		{{"<BR>"}}{{"<BR>"}}{{"<BR>"}}{{"<BR>"}}{{"<BR>"}}
 	{{Form::close()}}
 	</div>
@stop