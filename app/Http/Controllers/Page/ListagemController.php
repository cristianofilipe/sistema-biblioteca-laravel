<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\CD;
use App\Models\Livro;
use App\Models\Professor;
use App\Models\Revista;
use App\Models\TCC;
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
    public function livro(Request $request)
    {
        $query = Livro::query();

        if($request->filled('titulo')) {
            $query->where('titulo', 'like', '%'. $request->titulo .'%');
        }

        if($request->filled('editora')) {
            $query->where('editora', 'like', '%' . $request->editora . '%');
        }

        if($request->filled('isbn')) {
            $query->where('isbn', 'like', '%' . $request->isbn . '%');
        }

        if($request->filled('ano_publicacao')) {
            $query->where('ano_publicacao', 'like', '%' . $request->ano_publicacao . '%');
        }

        if ($request->filled('data_entrada')) {
            // Se a data de entrada for fornecida, buscamos nas relações de material
            $query->whereHas('material', function ($q) use ($request) {
                $q->whereDate('data_entrada', $request->data_entrada);
            });
        }

        if ($request->filled('modo_aquisicao')) {
            // Se o modo de aquisicao for fornecido, buscamos nas relações de material
            $query->whereHas('material', function ($q) use ($request) {
                $q->where('modo_aquisicao', $request->modo_aquisicao);
            });
        }

        if ($request->filled('autor')) {
            // Se o modo de aquisicao for fornecido, buscamos nas relações de material
            $query->whereHas('autores', function ($q) use ($request) {
                $q->where('nome', 'like', '%'. $request->autor .'%');
            });
        }

        $livros = $query->get();

        return view('pages/listagem/livro', compact('livros'));
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

        if($request->filled('isbn')) {
            $query->where('isbn', 'like', '%' . $request->isbn . '%');
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
            // Se o modo de aquisicao for fornecido, buscamos nas relações de material
            $query->whereHas('material', function ($q) use ($request) {
                $q->where('modo_aquisicao', $request->modo_aquisicao);
            });
        }

        $revistas = $query->get();

        return view('pages/listagem/revista', ['revistas' => $revistas]);
    }

    /**
     * Listagem de todos os tcc's cadastradas
     */
    public function tcc(Request $request)
    {
        $query = TCC::query();

        if($request->filled('id')) {
            $query->where('id_tcc', $request->id);
        }

        if($request->filled('tema')) {
            $query->where('tema', 'like', '%' . $request->tema . '%');
        }

        if($request->filled('orientador')) {
            $query->where('orientador', 'like', '%' . $request->orientador . '%');
        }

        if($request->filled('autor')) {
            $query->whereHas('autores', function($q) use ($request) {
                $q->where('nome', 'like', '%'. $request->autor . '%');
            });
        }

        if ($request->filled('data_entrada')) {
            // Se a data de entrada for fornecida, buscamos nas relações de material
            $query->whereHas('material', function ($q) use ($request) {
                $q->whereDate('data_entrada', $request->data_entrada);
            });
        }
        

        $tccs = $query->with('material')->get();
        //dd($tccs);
        return view('pages/listagem/tcc', compact('tccs'));
    }

    /**
     * Listagem de todos os cd's cadastradas
     */
    public function cd()
    {
        $cds = CD::with('material')->get();

        return view('pages/listagem/cd', compact('cds'));
    }

    /**
     * Listagem de todos os alunos cadastrados
     */
    public function alunos(Request $request)
    {
        $query = Aluno::query();

        if($request->filled('classe')) {
            $query->where('classe', $request->classe);
        }

        if($request->filled('turma')) {
            $query->where('turma', 'like', '%' . $request->turma . '%');
        }

        if ($request->filled('nome')) {
            
            $query->whereHas('visitante', function ($q) use ($request) {
                $q->whereDate('nome', $request->nome);
            });
        }

        if ($request->filled('telefone')) {
            
            $query->whereHas('visitante.telefones', function ($q) use ($request) {
                $q->whereDate('numero', $request->telefone);
            });
        }

        
        $alunos = Aluno::with('visitante', 'curso')->get();
        return view('pages/listagem/alunos', compact('alunos'));
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
