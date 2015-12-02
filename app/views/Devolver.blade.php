@extends('templates.template')

@section('content')
<script>
$(function(){
$('[data-toggle="tooltip"]').tooltip()
});
</script>
<h1 >Cliente {{{$dadoscliente->nome}}}</h1>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <span style="display: none">
  {{{$i=0}}}</span> 
  @forelse ($resultado as $emprestimo)
  
  <div id="listaEmprestimos" class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading{{{$emprestimo->id_emprestimo}}}">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{{$emprestimo->id_emprestimo}}}" aria-expanded="true" aria-controls="collapseOne">
          Emprestimo #{{{$emprestimo->id_emprestimo}}} <span data-toggle="tooltip" data-placement="right" title="Devolver Todos Livros Do Emprestimo" align='Left'></span ></a>
        </a>
      </h4>
    </div>
    <div id="collapse{{{$emprestimo->id_emprestimo}}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{{$emprestimo->id_emprestimo}}}">
      <div id="listaExemplares" class="panel-body">
        <blockquote>

          @forelse ($resultado[$i]->exememp as $exemplar) 
      		  @if($exemplar->devolvido == 0)
            <p>{{{$exemplar->id}}}  {{{$exemplar->nome_livro}}}    <a href="devolvendo/{{{$exemplar->id}}}" title="Devolver"><span class='glyphicon glyphicon-remove ' data-toggle="tooltip" data-placement="right" title="Devolver Cada Exemplar Separadamente"></span></a></p>
            @else
            <p>{{{$exemplar->id}}} {{{$exemplar->nome_livro}}} <span class='glyphicon glyphicon-ok ' data-toggle="tooltip" data-placement="right" title="Devolvido"></span></a></p>
      		@endif
          @empty
            Nenhum exemplar
          @endforelse

        </blockquote>
      </div>

      

    </div>
  </div>
    <span style="display: none">
  {{{$i++}}}</span> 
  <br>
  @empty
    Não tem nenhum emprestimo
  @endforelse
  
@stop