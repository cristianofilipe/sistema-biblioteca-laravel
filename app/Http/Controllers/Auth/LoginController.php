<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UsuarioFormRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function register(UsuarioFormRequest $request)
    {
        $usuario = new Usuario();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->tipo_usuario = $request->tipo_usuario;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return redirect()->route('listagem-usuarios')->with('Usuario criado com sucesso!');
    }
}
