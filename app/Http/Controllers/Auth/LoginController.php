<?php

namespace App\Http\Controllers\Auth;

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
        
        $user = User::findByUsername(
            $request->username,
        );

        //dd($user);
        if($user->cnomeusua === $request->username && $user->csenhusua === md5($request->password)){
            return back()->withErrors([
                'username' => 'Usuário Válido!',
            ]);
        }
        
        return back()->withErrors([
            'username' => 'Nome de usuário ou senha inválidos.',
        ]);

        //Teste 
        //Auth::login($user, false);
        //return redirect()->intended('/home'); 
    }

    public function logout()
    {
        Auth::logout();  
        return redirect('/login');  
    }
}