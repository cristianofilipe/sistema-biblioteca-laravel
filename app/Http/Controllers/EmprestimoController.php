<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::with('material.livro', 'visitante.professor')->get();

        return view('pages.emprestimo.index', compact('emprestimos'));
    }
}
