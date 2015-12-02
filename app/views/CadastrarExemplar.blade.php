@extends('templates.template')

@section('content')
<script>
		$(function(){
				$('.datepicker').datepicker({
				    format: 'dd/mm/yyyy',
				    startDate: 'today', //hoje no mínimo
				    endDate: '+7d', //mais 7 dias
				    language: 'pt-BR',
				    orientation: 'bottom',
				    todayHighlight: true,
				    daysOfWeekDisabled: [0,6] //desabilita os finais de semana
				});

				//Gera o multiselect com com busca
				$('#id_exemplar').multiselect({
					buttonClass: 'btn btn-primary margin-right-bigger-sm block-sm',
					enableFiltering: true,
					enableCaseInsensitiveFiltering: true,
					includeSelectAllOption: false,
					disableIfEmpty: true,
					maxHeight: 300,
					numberDisplayed: 5,
				});


		});
	</script>
 			<h1>Cadastrar Novo Exemplar</h1>
 	@if (count($errors) > 0)
 		@foreach($errors->all() as $mensagem)
 		<p>{{$mensagem}}</p>
 		@endforeach
 	@endif
	
		
 			{{Form::open(array('url' => 'exemplar/adicionar'))}}
<div class="row">
<div class="col-md-4">
		<label>Selecione o Livro</label>
 		{{ Form::select('id_livrodois', $livros,'',array('class' =>'form-control')) }}
 		
 		{{"<BR>"}}

 	
<label>Condições Fisicas do Livros</label>
 		{{Form::text('estado_livro','', array('placeholder' =>'Condição do Livro','class' =>'form-control'))}}{{"<BR>"}}
<label>Ano Lançamento de Lançamento</label>
 		{{Form::text('ano','', array('placeholder' =>'Ano','class' =>'form-control'))}}{{"<BR>"}}
 <label>Edição do Livro</label>
 		{{Form::text('edicao','', array('placeholder' =>'Edicao','class' =>'form-control'))}}{{"<BR>"}}
 		
 		{{Form::submit('Submeter',array('class'=>'btn btn-default'))}}
 		</div></div>
 	{{Form::close()}}
 	
@stop