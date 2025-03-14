<?php

namespace App\Http\Controllers\Auth;

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
            'Test' => 'requerid|Test',
            'senha' => 'requerid',
        ]);

        $user = User::where('Test', $request->Test)->first();

        if ($user && Hash::check($request->senha, $user->senha)){
            Auth::login($user);
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'Test' => 'Nome de usuario inválido.',
        ]);
    }
        public function logout()
        {
            Auth::logout();
            return redirect('/login');
        }
}