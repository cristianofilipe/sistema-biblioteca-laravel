<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorFormRequest;
use App\Models\Curso;
use App\Models\Professor;
use App\Models\Visitante;

class ProfessorController extends Controller
{
    /**
     * Metodo responsavel por exibir um professor
     * @param int $id => id do professor a ser exibido
     */
    public function show(int $id)
    {
        $professor = Professor::with('visitante.telefones', 'cursos')->find($id);

        return view('pages/listagem/professor-show', compact('professor'));
    }

    /**
     * Metodo responsavel por cadastrar novo professor
     * @param ProfessorFormRequest $request => dados a virem do formulario
     */
    public function store(ProfessorFormRequest $request)
    {
        $professor = new Professor();
        $visitante = new Visitante();

        $visitante->nome = $request->nome;
        $visitante->sexo = $request->sexo;
        $visitante->save();

        // Salva os telefones associados à visitante
        foreach($request->tel as $tel) {
            if(!is_null($tel)) {
                $visitante->telefones()->create(['numero' => $tel]);
            }
        }

        $professor->email = $request->email;
        $professor->visitante_id = $visitante->id_visitante;
        $professor->save();

        // Sincroniza os cursos associados ao professor
        $professor->cursos()->sync($request->cursos);

        return redirect()->route('listagem-professores');

    }

    /**
     * Metodo responsavel por exibir o formulario de edicao do professor
     * @param int $id => registro a ser exibido no formulario
     */
    public function edit(int $id)
    {
        $professor = Professor::with('visitante.telefones', 'cursos')->find($id);
        $cursos = Curso::all();

        return view('pages/cadastro/professor-edit', compact('professor', 'cursos'));
    }

    /**
     * Metodo responsavel por persistir os dados da edicao na base de dados
     * @param ProfessorFormRequest $request => Dados da requisicao
     * @param int $id => id do professor a ser atualizado
     */
    public function update(ProfessorFormRequest $request, int $id)
    {
        $professor = Professor::findOrFail($id); // Recupera o professor existente

        // Atualiza os campos do professor
        $professor->update([
            'email' => $request->email,
        ]);

        // Atualiza os campos da visitante associada ao professor
        $professor->visitante->update([
            'nome' => $request->nome,
            'sexo' => $request->sexo,
        ]);

        // Atualiza os telefones associados à visitante
        $telefones = $request->tel; // Supondo que os telefones sejam enviados como um array
        $professor->visitante->telefones()->delete(); // Deleta todos os telefones existentes
        foreach ($telefones as $telefone) {
            $professor->visitante->telefones()->create(['numero' => $telefone]);
        }

        // Sincroniza os cursos associados ao professor
        $professor->cursos()->sync($request->cursos);

        return redirect()->route('listagem-professores');
    }

    /**
     * Metodo responsavel por deletar um aluno
     * @param int $id => id do aluno a ser deletado
     */
    public function destroy(int $id)
    {
        $professor = Professor::find($id);
        $professor->delete();

        return redirect()->route('listagem-professores');
    }
}
