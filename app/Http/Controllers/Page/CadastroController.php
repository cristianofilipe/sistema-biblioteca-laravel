<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Curso;
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
        $cursos = Curso::all();
        return view('pages/cadastro/tcc', ['cursos' => $cursos]);
    }

    public function cd()
    {
        return view('pages/cadastro/cd');
    }

    public function aluno()
    {
        $cursos = Curso::all();
        return view('pages/cadastro/aluno', compact('cursos'));
    }

    public function professor()
    {
        $cursos = Curso::all(['id_curso','nome']);
        return view('pages/cadastro/professor', compact('cursos'));
    }
}
