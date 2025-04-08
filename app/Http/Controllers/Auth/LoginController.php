<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  
    } 


    /* public function login(Request $request)
    {
        Log::info('Tentativa de login para o usuário: ' . $request->username); //[2025-04-08 15:45:01] local.INFO: Tentativa de login para o usuário: NICOLAS.PESSOA  
    
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('cnomeusua', $request->username)->first();
    
        if (!$user) {
            Log::warning('Usuário não encontrado: ' . $request->username);
            return back()->withErrors([
                'username' => 'Nome de usuário ou senha inválidos.',
            ]);
        }
    
        Log::info('Usuário encontrado: ' . $user->cnomeusua);  [2025-04-08 15:45:01] local.INFO: Usuário encontrado: NICOLAS.PESSOA  
    
        if ($user->csenhusua === md5($request->password)) {
            Log::info('Senha verificada com sucesso para: ' . $user->cnomeusua); [2025-04-08 15:45:01] local.INFO: Senha verificada com sucesso para: NICOLAS.PESSOA  
            Auth::login($user);
            Log::info('Usuário autenticado: ' . $user->cnomeusua); [2025-04-08 15:45:01] local.INFO: Usuário autenticado: NICOLAS.PESSOA 
            Log::info('Redirecionando para: /home'); [2025-04-08 15:45:01] local.INFO: Redirecionando para: /home  
            return redirect()->intended('/home');
        } else {
            Log::warning('Senha incorreta para: ' . $user->cnomeusua);
            return back()->withErrors([
                'username' => 'Nome de usuário ou senha inválidos.',
            ]);
        }
    }*/ 




    /*$user = User::where('cnomeusua', $request->username)->first();

    if (!$user) {
        return back()->withErrors([
            'username' => 'Nome de usuário ou senha inválidos.',
        ]);
    }

    /* if($user->cnomeusua === $request->username && $user->csenhusua === md5($request->password)){
        return back()->withErrors([
            'username' => 'Usuário Válido!', //return
        ]);
    } *

    if ($user->csenhusua === md5($request->password)) {
        Auth::login($user); 
        dd(Auth:: check());
        dd(redirect()->intended('/home')); //true
        return redirect()->intended('/home');
    }*/




    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',  
            'password' => 'required', 
        ]);
     

        $user = User::where('cnomeusua', $request->username)->first();

       
       /*$user = User::findByUsername(
            $request->username,
        ); */

        if (!$user) {
            return back()->withErrors([
                'username' => 'Nome de usuário ou senha inválidos.',
            ]);
        }
        
       /* if($user->cnomeusua === $request->username && $user->csenhusua === md5($request->password)){
            return back()->withErrors([
                'username' => 'Usuário Válido!', //return
            ]);
        } */

        if ($user->cnomeusua === $request->username && $user->csenhusua === md5($request->password)) {
            Auth::login($user); //Argument 1 passed to Illuminate\Auth\SessionGuard::login()
            //dd();
            return redirect('/home');
        }
        
        return back()->withErrors([
            'username' => 'Nome de usuário ou senha inválidos.',
        ]);

         //TESTE DE ROTA
        //Auth::login($user);
       // return redirect()->intended('/home'); 
    }

    public function logout()
    {
        Auth::logout();  
        return redirect('/login');  
    }
} 