<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoFormRequest;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\usuario;

class AlunoController extends Controller
{

    /**
     * Metodo responsavel por exibir um aluno
     * @param int $id => id do aluno a ser exibido
     */
    public function show(int $id)
    {
        if(!$aluno = Aluno::with('usuario.telefones', 'curso')->find($id)) {
            return back();
        }

        return view('pages/listagem/aluno-show', ['aluno' => $aluno]);
        
    }

    /**
     * Metodo responsavel por cadastrar novo aluno
     * @param StoreUpdateAlunoFormRequest $request => dados a virem do formulario
     */
    public function store(AlunoFormRequest $request)
    {
        $aluno = new Aluno();
        $usuario = new Usuario();

        $usuario->nome = $request->nome;
        $usuario->sexo = $request->sexo;
        $usuario->save();

        // Salva os telefones associados à usuario
        foreach($request->tel as $tel) {
            if(!is_null($tel)) {
                $usuario->telefones()->create(['numero' => $tel]);
            }
        }

        $aluno->classe = $request->classe;
        $aluno->turma = $request->turma;
        $aluno->curso_id = $request->curso;
        $aluno->usuario_id = $usuario->id_usuario;
        $aluno->save();
        
        return redirect()->route('listagem-alunos');
    }

    /**
     * Metodo responsavel por exibir o formulario de edicao do aluno
     * @param int $id => registro a ser exibido no formulario
     */
    public function edit(int $id)
    {
        $aluno = Aluno::with('usuario.telefones')->find($id);
        $cursos = Curso::all();
        $telefones = $aluno->usuario->telefones;
        if(!$aluno) {
            return back();
        }

        return view('/pages/cadastro/aluno-edit', compact('aluno', 'telefones', 'cursos'));
    }

    /**
     * Metodo responsavel por persistir os dados da edicao na base de dados
     * @param StoreUpdateAlunoFormRequest $request => Dados da requisicao
     * @param int $id => id do aluno a ser atualizado
     */
    public function update(AlunoFormRequest $request, int $id)
    {
        $aluno = Aluno::findOrFail($id);

        $aluno->update([
            'classe' => $request->classe,
            'turma' => $request->turma,
            'curso_id' => $request->curso
        ]);

        $aluno->usuario->update([
            'nome' => $request->nome,
            'sexo' => $request->sexo
        ]);

        $telefones = $request->tel;
        $aluno->usuario->telefones()->delete();
        
        foreach($telefones as $telefone) {
            $aluno->usuario->telefones()->create(['numero' => $telefone]);
        }

        return redirect()->route('listagem-alunos');
    }

    /**
     * Metodo responsavel por deletar um aluno
     * @param int $id => id do aluno a ser deletado
     */
    public function destroy(int $id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();

        return redirect()->route('listagem-alunos');
    }
}
