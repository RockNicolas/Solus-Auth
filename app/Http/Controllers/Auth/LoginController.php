<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
      //  Log::info('Senha criptografada:', ['hashed_password' => $hashedPassword]);
        $user = User::findByUsername(
            $request->username,
        );

        if($user->cnomeusua === $request->username && $user->csenhusua === md5($request->password)){
            return back()->withErrors([
                'username' => 'Usuário Válido!',
            ]);
        }
        
        return back()->withErrors([
            'username' => 'Nome de usuário ou senha inválidos.',
        ]);

        /*if (!$user) {
            return back()->withErrors([
                'username' => 'Nome de usuário ou senha inválidos.',
            ]);
        } */

        
        //Auth::login($user, false);
          
        //return redirect()->intended('/home'); 
    }

    public function logout()
    {
        Auth::logout();  
        return redirect('/login');  
    }
}