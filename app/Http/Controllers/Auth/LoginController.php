<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            return back();
        }

        return view('login/index');
    }

    public function auth(LoginRequest $request)
    {
        $credenciais = $request->only('email', 'password');

        if(Auth::attempt($credenciais)) {
            return redirect()->route('home');            
        }

        return redirect()->back()->with('erro', 'Email/Senha invalida');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
