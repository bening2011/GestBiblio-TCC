<html>
<head>
	<title>BiblioGeste</title>
	{{HTML::script('assets/js/bootstrap.js')}}
	{{HTML::style('assets/css/bootstrap.css')}}
  {{HTML::script('assets/js/bootstrap-datepicker.js')}}
  {{HTML::script('assets/js/jquery-1.11.3.min.js')}}
  {{HTML::style('assets/css/datepicker.css')}}
	<link rel="icon" type="image/png" href="/assets/css/logo.png" />

</head>
<body>
	<header>
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <nav class="navbar ">
  <div class="container-fluid">

      <a class="logo" href="#">
        <img alt="Brand" src="/assets/css/bibliogest.png">
      </a>

         <ul class="nav nav-pills ">
  
  <li role="presentation" class="{{set_active('cliente')}}"><a href="/cliente">Cliente</a></li>
  <li role="presentation" class="{{set_active('usuario')}}"><a href="/usuario">Usuário</a></li>
  <li role="presentation" class="{{set_active('livro')}}"><a href="/livro">Livro</a></li>
  <li role="presentation" class="{{set_active('exemplar')}}"><a href="/exemplar">Exemplar</a></li>
  <li role="presentation" class="{{set_active('emprestimo')}}"><a href="/emprestimo">Emprestimo</a></li>
</ul><!-- /.navbar-collapse -->

  </div>

</nav>

    </div>

 
  </div><!-- /.container-fluid -->
</nav>
	</header>
		
		<div class="content container">
			@yield('content')
		</div>


	<footer class="footer panel-footer">
	© 2015 BiblioGeste - Sistema de Gestão de Bibliotecas - Desenvolvido por Eduardo Bening
	</footer>
</body>
</html>