<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  
    }

   /* public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',  
            'password' => 'required', 
        ]);

        // Criptografar a senha informada pelo usuário em MD5
        $hashedPassword = md5($request->password);

        // Log da senha criptografada para fins de depuração (opcional)
        Log::info('Senha criptografada:', ['hashed_password' => $hashedPassword]);

        // Buscar o usuário pelo nome de usuário e comparar a senha criptografada com a armazenada no banco
        $user = User::findByUsernameAndPassword(
            $request->username,
            $hashedPassword
        );

        // Log para verificar o que está sendo retornado da consulta
        Log::info('Usuário encontrado:', ['user' => $user]);

        if (!$user) {
            return back()->withErrors([
                'username' => 'Nome de usuário ou senha inválidos.',
            ]);
        }
    
        Auth::login($user);  // Faz o login do usuário
        return redirect()->intended('/home');  // Redireciona para a página de home ou a página desejada
    } */

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',  
            'password' => 'required', 
        ]);

        $hashedPassword = md5($request->password);
        Log::info('Senha criptografada:', ['hashed_password' => $hashedPassword]);
        $user = User::findByUsernameAndPassword(
            $request->username,
            $hashedPassword
        );

        Log::info('Usuário encontrado:', ['user' => $user]);

        if (!$user) {
            return back()->withErrors([
                'username' => 'Nome de usuário ou senha inválidos.',
            ]);
        }
        
        Auth::login($user);  
        return redirect()->intended('/home'); 
    }


    public function logout()
    {
        Auth::logout();  
        return redirect('/login');  
    }
}


/* namespace App\Http\Controllers\Auth; 

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',  
            'password' => 'required', 
        ]);

        $user = User::findByUsernameAndPassword(
                $request->username,
                $request->password
        );
        
        dd($user);
        if (!$user) {
            return back()->withErrors([
                'username' => 'Nome de usuário ou senha inválidos.',
            ]);
        }
    
        Auth::login($user);
        return redirect()->intended('/home');
    }

    public function logout()
    {
        Auth::logout();  
        return redirect('/login');  
    }
}


/*namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',  
        'password' => 'required', 
    ]);

    $hashedPassword = md5($request->password);

    $user = User::findByUsername($request->username);


    if ($user && $user->csenhusua === $hashedPassword) {
        Auth::login($user);  
        return redirect()->intended('/home');
    }

    return back()->withErrors([
        'username' => 'Nome de usuário ou senha inválidos.',
    ]);
}


  /*  public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',  
            'password' => 'required', 
        ]);

        // Teste para ver cript de md5
        $hashedPassword = md5($request->password);

        $user = User::findByUsername($request->username);

        if ($user && $user->csenhusua === $hashedPassword) {
            Auth::login($user);
            return redirect()->intended('/home');
        } 
        
        dd($user);
        
        return back()->withErrors([
            'username' => 'Nome de usuário ou senha inválidos.',
        ]);
    }  */

    /*$request->validate([
        'username' => 'required',  
        'password' => 'required', 
    ]);

    $user = User::findByUsernameAndPassword(
        $request->username,
        $request->password
    );

    dd($user);
    if (Hash::make($request->password) === $user->csenhusua) {
        Auth::login($user);
        return redirect()->intended('/home');
    } 

    return back()->withErrors([
        'username' => 'Nome de usuário ou senha inválidos.',
    ]);
'
    public function logout()'
    {
        Auth::logout();  
        return redirect('/login');  
    }
}*/