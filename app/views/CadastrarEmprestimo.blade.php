@extends('templates.template')

@section('content')
{{HTML::script('assets/js/jquery-1.11.3.min.js')}}
{{HTML::script('assets/js/bootstrap-datepicker.min.js')}}
{{HTML::script('assets/js/bootstrap-datepicker.pt-BR.min.js')}}
{{HTML::script('assets/js/bootstrap-multiselect.js')}}

  {{HTML::style('assets/css/datepicker.css')}}
  {{HTML::style('assets/css/bootstrap-multiselect.css')}}
 
 			<h1>Cadastrar Novo Emprestimo</h1>
 	@if (count($errors) > 0)
 		<div class="alert alert-danger">
 		@foreach($errors->all() as $mensagem)
 		<p>{{$mensagem}}</p>
 		@endforeach
 		</div>
 	@endif
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

<div  class= "col-xs-6">
 		{{Form::open()}}

 		<label>Cliente:</label> {{"<BR>"}} {{ Form::select('id_clientedois', ($clientes), null, array('class' =>'form-control')) }}
 		
 		{{"<BR>"}}

 		<label>Exemplares:</label> {{"<BR>"}} {{ Form::select('id_exemplar[]', $exemplares, '', array('id' => 'id_exemplar','multiple','class' =>'form-control')) }} 
 
 		{{"<BR>"}}{{"<BR>"}}

 		<div class="row">
 		<div class="col col-xs-4">
 			<label>Data para devolução:</label> {{"<BR>"}}
 			{{Form::text('data_provavel_devolucao','', array('id' => 'datepicker', 'placeholder' =>'Data Devolução', 'class'=> 'form-control datepicker'))}}{{"<BR>"}}
 		</div>
 		</div>

		{{"<BR>"}}	

 		{{Form::submit('Submeter', array('class' =>'btn btn-default'))}}
 		{{Form::close()}}
 	</div></div>
@stop