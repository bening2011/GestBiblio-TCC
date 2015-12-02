
@extends('templates.template')

@section('content')
<script>
		$(function(){
				
				$('#dropdown-toggle').dropdown();

 				$('[data-toggle="tooltip"]').tooltip();

				
				});


		});
	</script>

{{Form::open()}}
	
<div class=''>
<div class='col col-md-6 center'>
<label>Selecione o Tipo de Relatório</label> <br>{{"<BR>"}} {{ Form::select('Tipo', $TR, '', array('id' => 'dropdown-toggle','data-toggle' =>'tooltip', 'data-placement'=>'top', 'title' => 'Selecione Qual Tipo de Relatorio Deseja Fazer','class' =>'form-control')) }} 

<br>
{{Form::submit('Submeter', array('class' =>'btn btn-default'))}}
 		{{Form::close()}}</div>
</div>
@stop


