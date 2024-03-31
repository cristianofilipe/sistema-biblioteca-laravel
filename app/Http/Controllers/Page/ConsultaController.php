<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        return view('pages/consulta/index');
    }

    public function livro()
    {
        return view('pages/consulta/livro');
    }

    public function revista()
    {
        return view('pages/consulta/revista');
    }

    public function tcc()
    {
        return view('pages/consulta/tcc');
    }

    public function cd()
    {
        return view('pages/consulta/cd');
    }
}
