<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAlunoFormRequest;
use App\Models\Aluno;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function store(StoreUpdateAlunoFormRequest $request)
    {
        $aluno = new Aluno();
        $pessoa = new Pessoa();

        $pessoa->nome = $request->nome;
        $pessoa->sexo = $request->sexo;
        $pessoa->save();

        $aluno->classe = $request->classe;
        $aluno->turma = $request->turma;
        $aluno->curso_id = $request->curso;
        $aluno->pessoa_id = $pessoa->id_pessoa;
        $aluno->save();
        
        return redirect()->route('home');
    }

    public function edit(int $id)
    {
        $aluno = Aluno::with('pessoa')->find($id);
        if(!$aluno) {
            return back();
        }

        return view('/pages/cadastro/aluno-edit', ['aluno' => $aluno]);
    }

    public function update(StoreUpdateAlunoFormRequest $request, int $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->pessoa->nome = $request->nome;
        $aluno->pessoa->sexo = $request->sexo;
        $aluno->classe = $request->classe;
        $aluno->turma = $request->turma;
        $aluno->curso->id_curso = $request->curso;
        // Atualize outros campos conforme necessário
        $aluno->pessoa->save();
        $aluno->save();

        return redirect()->route('home');
    }
}
