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
     
        $user = User::where('cnomeusua', $request->username)->first();

       //$user = User::findByUsername($request->username,); 

        if (!$user) {
            return back()->withErrors([
                'username' => 'Nome de usuário ou senha inválidos.',
            ]);
        }

        if ($user->cnomeusua === $request->username && $user->csenhusua === md5($request->password)) {
            Auth::login($user); 
            //dd(Auth::check(), Auth::user());
            //return redirect('/home');
            //return redirect()->route('home');
            return redirect()->intended('/home');
            //return redirect()->to('/home');
            //return redirect()->intended(route('home'));
        }

            /*return back()->withErrors([
                'username' => 'Usuário Válido!', //return
            ]);*/
        
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