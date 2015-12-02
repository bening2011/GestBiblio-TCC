<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
    {
        return View::make('hello');
    }
 
    public function getEntrar()
    {
        $titulo = 'Entrar - Desenvolvendo com Laravel';
        return View::make('home/entrar', compact('titulo'));
    }
 
    public function postEntrar()
    {
        // Opção de lembrar do usuário
        $remember = false;
        if(Input::get('remember'))
        {
            $remember = false;
        }
        
        // Autenticação
        if (Auth::attempt(array(
            'email'=>Input::get('email'), 
            'password'=>Input::get('senha')
            ), $remember))
        {
            Session::put('segredo', 'vaca');

            return Redirect::to('home');
        }
        else
        {
            return Redirect::to('entrar')
                ->with('flash_error', 1)
                ->withInput();
                $senha= Input::get('senha');
        }

    }
    
    public function getSair()
    {
        Auth::logout();
        return Redirect::to('/entrar');
    }
}
