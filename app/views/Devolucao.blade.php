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
				$('#dropdown-toggle').dropdown()

 				$('[data-toggle="tooltip"]').tooltip()

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

{{Form::open()}}
	
<div class=''>
<div class='col col-md-6 center'>
<h1>Devolução</h1>
<h1></h1>
<label>Selecione o Cliente</label> <br>{{"<BR>"}} {{ Form::select('id_cliente', $emprestimos, '', array('id' => 'dropdown-toggle','data-toggle' =>'tooltip', 'data-placement'=>'top', 'title' => 'Selecione o Cliente que deseja fazer a devolução','class' =>'form-control')) }} 

<br>
{{Form::submit('Submeter', array('class' =>'btn btn-default'))}}
 		{{Form::close()}}</div>
</div>
@stop

