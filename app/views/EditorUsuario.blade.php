@extends('templates.template')

@section('content')
<script>
		$(function(){
				
				$('#dropdown-toggle').dropdown();
	});
	</script>
 	@if ( isset($usuarios->id) )
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
 	@if ( isset($usuarios->id) )
 			{{Form::open(array('url' => "usuario/editar/$usuarios->id"))}}
 		@else
 			{{Form::open(array('url' => 'usuario/adicionar'))}}
 		@endif
 		<label>Nome</label>
 		{{Form::text('nome', isset($usuarios->nome) ? $usuarios->nome :'', array('placeholder' =>'Nome', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 		<label>CPF</label>
 		{{Form::text('cpf', isset($usuarios->cpf) ? $usuarios->cpf :'', array('placeholder' =>'CPF', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			<label>RG</label>
 		{{Form::text('rg', isset($usuarios->rg) ? $usuarios->rg :'', array('placeholder' =>'RG', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			<label>Endereço</label>
 		{{Form::text('endereco', isset($usuarios->endereco) ? $usuarios->endereco :'', array('placeholder' =>'Endereço', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			<label>Estado</label>
 		{{Form::text('estado', isset($usuarios->estado) ? $usuarios->estado :'', array('placeholder' =>'Estado', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			<label>Telefone</label>
 		{{Form::text('telefone', isset($usuarios->telefone) ? $usuarios->telefone :'', array('placeholder' =>'Telefone', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			<label>Cidae</label>
 		{{Form::text('cidade', isset($usuarios->cidade) ? $usuarios->cidade :'', array('placeholder' =>'Cidade', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			<label>E-mail</label>
 		{{Form::text('email', isset($usuarios->email) ? $usuarios->email :'', array('placeholder' =>'Email', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			<label>Tipo de Usuário</label>
 		{{Form::select('tipo', array(1 => 'admin', 2 => 'comum'),'', array('placeholder' =>'Tipo Usuario', 'class'=> 'form-control'))}}
 			{{"<BR>"}}
 			<label>Senha</label>
 		{{Form::password('senha',  array('placeholder' =>'Senha', 'class'=> 'form-control'))}}
 			{{"<BR>"}}{{"<BR>"}}
 		{{Form::submit('Submeter', array('class'=> 'btn btn-default'))}}
 		{{"<BR>"}}{{"<BR>"}}{{"<BR>"}}{{"<BR>"}}{{"<BR>"}}
 	{{Form::close()}}
 	</div>
@stop