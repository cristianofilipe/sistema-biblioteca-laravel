<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Revista;
use Illuminate\Http\Request;

class ListagemController extends Controller
{
    public function index()
    {
        return view('pages/listagem/index');
    }

    /**
     * Listagem de todos os livros cadastrados
     */
    public function livro()
    {
        return view('pages/listagem/livro');
    }

    /**
     * Listagem de todas as revistas cadastradas
     */
    public function revista(Request $request)
    {
        $query = Revista::query();

        if($request->filled('id')) {
            $query->where('id_revista', $request->id);
        }

        if($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        if($request->filled('subtitulo')) {
            $query->where('subtitulo', 'like', '%' . $request->subtitulo . '%');
        }

        if($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        if ($request->filled('data_entrada')) {
            // Se a data de entrada for fornecida, buscamos nas relações de material
            $query->whereHas('material', function ($q) use ($request) {
                $q->whereDate('data_entrada', $request->data_entrada);
            });
        }

        if ($request->filled('modo_aquisicao')) {
            // Se a data de entrada for fornecida, buscamos nas relações de material
            $query->whereHas('material', function ($q) use ($request) {
                $q->whereDate('modo_aquisicao', $request->modo_aquisicao);
            });
        }

        $revistas = $query->get();

        return view('pages/listagem/revista', ['revistas' => $revistas]);
    }

    /**
     * Listagem de todos os tcc's cadastradas
     */
    public function tcc()
    {
        return view('pages/listagem/tcc');
    }

    /**
     * Listagem de todos os cd's cadastradas
     */
    public function cd()
    {
        return view('pages/listagem/cd');
    }

    /**
     * Listagem de todos os alunos cadastrados
     */
    public function alunos()
    {
        $alunos = Aluno::with('pessoa', 'curso')->get();
        return view('pages/listagem/alunos', ['alunos' => $alunos]);
    }

    /**
     * Listagem de todos os professores cadastrados
     */
    public function professores()
    {
        $professores = Professor::with('pessoa.telefones', 'cursos')->get();

        return view('pages/listagem/professor', compact('professores'));
    }
}
