<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index()
    {
        return view('pages/cadastro/index');
    }

    public function livro()
    {
        return view('pages/cadastro/livro');
    }

    public function revista()
    {
        return view('pages/cadastro/revista');
    }

    public function tcc()
    {
        return view('pages/cadastro/tcc');
    }

    public function cd()
    {
        return view('pages/cadastro/cd');
    }
}
