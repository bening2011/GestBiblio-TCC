<html>
<head>
	<title>BiblioGeste</title>
  {{HTML::script('assets/js/jquery-1.11.3.min.js')}}
	{{HTML::script('assets/js/bootstrap.js')}}
	{{HTML::style('assets/css/bootstrap.css')}}
  {{HTML::script('assets/js/bootstrap-datepicker.js')}}
  {{HTML::script('assets/js/bootstrap-multiselect.js')}}
  {{HTML::style('assets/css/datepicker.css')}}
	<link rel="icon" type="image/png" href="/assets/css/logo.png" />

</head>
<body>
	<header>
		<nav class="navbar navbar-default">
  <div class="container-fluid topo">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <nav class="navbar ">
  <div class="container-fluid ">

      <a class="logo" href="/home">
        <img alt="Brand" src="/assets/css/bibliogest.png">
      </a>

         <ul class="nav nav-pills ">
  
  <li role="presentation" class="{{set_active('cliente')}}"><a href="/cliente">Cliente</a></li>
  <li role="presentation" class="{{set_active('usuario')}}"><a href="/usuario">Usuário</a></li>
  <li role="presentation" class="{{set_active('livro')}}"><a href="/livro">Livro</a></li>
  <li role="presentation" class="{{set_active('exemplar')}}"><a href="/exemplar">Exemplar</a></li>
  <li role="presentation" class="{{set_active('emprestimo')}}"><a href="/emprestimo">Emprestimo</a></li>
   <li role="presentation" class="{{set_active('relatorio')}}"><a href="/relatorio">Relatórios</a></li>
</ul><!-- /.navbar-collapse -->

  </div>

</nav>

    </div>


<br>
@if(Auth::check())
<a href="{{ url('sair') }}" class="btn btn-danger navbar-btn pull-right">Sair</a>
@else
<a href="{{ url('entrar') }}" class="btn btn-success navbar-btn pull-right">Entrar</a>
@endif

 
  </div><!-- /.container-fluid -->
  
</nav>
	</header>
		
		<div class="content container">
			@yield('content')
		</div>


	<footer class="footer panel-footer">
	© 2015 GestBiblio - Sistema de Gestão de Bibliotecas - Desenvolvido por Eduardo Bening
	</footer>
</body>
</html>