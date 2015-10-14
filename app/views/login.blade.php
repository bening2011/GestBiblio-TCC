
<!DOCTYPE html>
<html class="bg-black">
    <head>

        <meta charset="UTF-8">

        <title>GestBiblio | Login</title>
{{HTML::script('assets/js/bootstrap.js')}}
    {{HTML::style('assets/css/bootstrap.css')}}
    {{HTML::style('assets/css/style.css')}}
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
       
        <link rel="stylesheet" href="/projeto/2149/4097/CakePHP_2.5.2/css/AdminLTE.css">

        <link rel="icon" type="image/x-icon" href="/projeto/2149/4097/CakePHP_2.5.2/img/favicon.png"/>

        <link rel="stylesheet" href="/projeto/2149/4097/CakePHP_2.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" href="/projeto/2149/4097/CakePHP_2.5.2/css/AdminLTE.css">

         <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-black">

        <div class="form-box" id="login-box">
            
                        
            <div class="header">Acesso ao Software</div>
            
             <form action="/projeto/2149/4097/CakePHP_2.5.2/users/login" id="validate" class="form-signin" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>               
                <div class="body bg-gray">

                    <div class="form-group">
                        <div class="input text"><label for="UserUsername">Username</label><input name="data[User][username]" class="form-control" placeholder="Usuário" value="demo" type="text" id="UserUsername"/></div>     
                    </div>

                    <div class="form-group">
                        <div class="input password"><label for="UserPassword">Password</label><input name="data[User][password]" class="form-control" placeholder="Senha" value="demo" type="password" id="UserPassword"/></div>     
                    </div>

                </div>

                <div class="footer">
                    <button type="submit" class="btn bg-olive btn-block">Entrar</button>
                </div>

            </form>

        </div> 

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>