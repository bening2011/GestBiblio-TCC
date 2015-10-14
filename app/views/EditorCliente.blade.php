@extends('templates.template')

@section('content')
	@if ( isset($clientes->id_cliente) )
 			<h1>Editar Cliente</h1>
 		@else
 			<h1>Cadastrar Novo Cliente</h1>
 		@endif
 	@if (count($errors) > 0)
 		@foreach($errors->all() as $mensagem)
 		<p>{{$mensagem}}</p>
 		@endforeach
 	@endif
	
		@if ( isset($clientes->id_cliente) )
 			{{Form::open(array('url' => "cliente/editar/$clientes->id_cliente"))}}
 		@else
 			{{Form::open(array('url' => 'cliente/adicionar'))}}
 		@endif
 		{{Form::text('nome', isset($clientes->nome) ? $clientes->nome :'', array('placeholder' =>'Nome'))}}{{"<BR>"}}
 		{{Form::text('nome_pai', isset($clientes->nome_pai) ? $clientes->nome_pai :'', array('placeholder' =>'Nome do Pai'))}}{{"<BR>"}}
 		{{Form::text('nome_mae', isset($clientes->nome_mae) ? $clientes->nome_mae :'', array('placeholder' =>'Nome da Mãe'))}}{{"<BR>"}}
 		{{Form::text('escola', isset($clientes->escola) ? $clientes->escola :'', array('placeholder' =>'Escola'))}}{{"<BR>"}}
 		{{Form::text('endereco', isset($clientes->endereco) ? $clientes->endereco :'', array('placeholder' =>'Endereço'))}}{{"<BR>"}}
 		{{Form::text('cidade', isset($clientes->cidade) ? $clientes->cidade :'', array('placeholder' =>'Cidade'))}}{{"<BR>"}}
 		{{Form::text('estado', isset($clientes->estado) ? $clientes->estado :'', array('placeholder' =>'Estado'))}}{{"<BR>"}}
 		{{Form::text('email', isset($clientes->email) ? $clientes->email :'', array('placeholder' =>'Email'))}}{{"<BR>"}}
 		{{Form::text('email_pais', isset($clientes->email_pais) ? $clientes->email_pais :'', array('placeholder' =>'Email dos Pais'))}}{{"<BR>"}}
 		{{Form::text('email_escola', isset($clientes->email_escola) ? $clientes->email_escola :'', array('placeholder' =>'Email da Escola'))}}{{"<BR>"}}
 		{{Form::text('telefone', isset($clientes->telefone) ? $clientes->telefone:'', array('placeholder' =>'Telefone'))}}{{"<BR>"}}{{"<BR>"}}
 		{{Form::submit('Submeter')}}
 	{{Form::close()}}
@stop