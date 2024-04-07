<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Pessoa;
use App\Models\Professor;
use App\Models\Telefone;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with('pessoa', 'curso')->get();
    
        return view('pages/home', ['alunos' => $alunos]);
    }
}
