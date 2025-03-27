<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  
    }

    /*public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',  
            'senha' => 'required', 
        ]);

        $user = User::findByUsernameAndPassword($request->username, $request->senha);

        if ($user) {
            Log::debug('Usuário logado:', ['user' => $user]);
            Auth::login($user);
            return redirect()->intended('/home');  
        }

        return back()->withErrors([
            'username' => 'Nome de usuário ou senha inválidos.',
        ]);
    } */

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',  
            'senha' => 'required', 
        ]);

        $user = User::findByUsername($request->username);

        if ($user && Hash::check($request->senha, $user->csenhusua)) {
            Auth::login($user);
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'username' => 'Nome de usuário ou senha inválidos.',
        ]);
    } 

    public function logout()
    {
        Auth::logout();  
        return redirect('/login');  
    }
}