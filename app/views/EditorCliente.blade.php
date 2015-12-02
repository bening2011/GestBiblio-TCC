@extends('templates.template')

@section('content')
	@if ( isset($clientes->id_cliente) )
 			<h1> Editar Cliente</h1>
 		@else
 			<h1>Cadastrar Novo Cliente</h1>
 		@endif
 	@if (count($errors) > 0)
 		@foreach($errors->all() as $mensagem)
 		<p>{{$mensagem}}</p>
 		@endforeach
 	@endif
	<div  class= "col-xs-6 "  >
		@if ( isset($clientes->id_cliente) )
 			{{Form::open(array('url' => "cliente/editar/$clientes->id_cliente"))}}
 		@else
 			{{Form::open(array('url' => 'cliente/adicionar'))}}
 		@endif
 		<label>Nome Cliente</label>
 		{{Form::text('nome', isset($clientes->nome) ? $clientes->nome :'', array('placeholder' =>'Nome', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>Nome Pai</label>
 		{{Form::text('nome_pai', isset($clientes->nome_pai) ? $clientes->nome_pai :'', array('placeholder' =>'Nome do Pai', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>Nome Mãe</label>
 		{{Form::text('nome_mae', isset($clientes->nome_mae) ? $clientes->nome_mae :'', array('placeholder' =>'Nome da Mãe', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>Escola</label>
 		{{Form::text('escola', isset($clientes->escola) ? $clientes->escola :'', array('placeholder' =>'Escola', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>Endereço</label>
 		{{Form::text('endereco', isset($clientes->endereco) ? $clientes->endereco :'', array('placeholder' =>'Endereço', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>Cidade</label>
 		{{Form::text('cidade', isset($clientes->cidade) ? $clientes->cidade :'', array('placeholder' =>'Cidade', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>Estado</label>
 		{{Form::text('estado', isset($clientes->estado) ? $clientes->estado :'', array('placeholder' =>'Estado', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>E-mail</label>
 		{{Form::text('email', isset($clientes->email) ? $clientes->email :'', array('placeholder' =>'Email', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>E-mail do Pais</label>
 		{{Form::text('email_pais', isset($clientes->email_pais) ? $clientes->email_pais :'', array('placeholder' =>'Email dos Pais', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>E-mail da Escola</label>
 		{{Form::text('email_escola', isset($clientes->email_escola) ? $clientes->email_escola :'', array('placeholder' =>'Email da Escola', 'class'=> 'form-control'))}}{{"<BR>"}}
 		<label>Telefone</label>
 		{{Form::text('telefone', isset($clientes->telefone) ? $clientes->telefone:'', array('placeholder' =>'Telefone', 'class'=> 'form-control'))}}{{"<BR>"}}{{"<BR>"}}
 		
 		{{Form::submit('Submeter', array('class'=> 'btn btn-default'))}}
 	</div>
 	{{Form::close()}}
@stop