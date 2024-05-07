<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmprestimoRequest;
use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Professor;
use App\Models\Visitante;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::with(['material.livro', 'visitante.professor'])->get();

        //dd($emprestimos);

        return view('pages.emprestimo.index', compact('emprestimos'));
    }

    /**
     * Metodo responsavel por criar um novo emprestimo
     */
    public function store(EmprestimoRequest $request)
    {
        //Verificar se o livro existe na tabela livros
        if(!$livro = Livro::where('titulo', 'like', '%'. $request->titulo .'%')->first()) {
            die("livro nao encontrado");
            //return redirect()->back()->with('erro', 'Livro nao encontrado'); 
        }

        //verificar se o professor existe na tabela professors
        if(!$professor = Visitante::where('nome', 'like', '%'. $request->nome_professor .'%')->first()) {
            die("Visitante nao encontrado");
            return redirect()->back()->with('erro', 'Professor nao encontrado');
        }

        //pegar a data actual
        $dataActual = now()->toDateString();

        //verificar o numero de emprestimo do visitante ao dia
        $numeroEmprestimos = Emprestimo::whereDate('created_at', $dataActual)
                                        ->where('visitante_id', $professor->id_visitante)
                                        ->count();

        //verifica se numero de emprestimos por e maior que 2
        if($numeroEmprestimos >= 2) {
            return redirect()->back()->with('erro_emprestimo', 'Este professor atingiu o seu limite de emprestimo por dia');
        } 

        //Criar um novo emprestimo
        $emprestimo = new Emprestimo();
        
        //Quem fez o emprestimo...
        $emprestimo->visitante_id = $professor->id_visitante;

        //O que foi emprestado
        $emprestimo->material_id = $livro->material_id;

        //Data do emprestimo
        $emprestimo->data_emprestimo = $request->data_emprestimo;

        $emprestimo->save();
        
        return redirect()->route('emprestimos');
    }

    //Metodo utilizado para a devolucao do livros
    public function devolucao(int $id)
    {
        $emprestimo = Emprestimo::find($id);

        //dd($emprestimo);
        //atualizar o campo data de devolucao
        $emprestimo->update([
            'data_devolucao' => now()->toDateTimeString()
        ]);

        return redirect()->route('emprestimos')->with('Devolucao feita com sucesso');
    }
}
