<?php

namespace App\Http\Controllers;

use App\Models\CD;
use Illuminate\Http\Request;

class CdController extends Controller
{
    /**
     * Metodo responsavel por exibir um cd
     * @param int $id => id do cd a ser exibido
     */
    public function show(int $id)
    {
        $cd = CD::with('material')->find($id);

        return view('pages/listagem/cd-show', ['cd' => $cd]);
    }

    /**
     * Metodo responsavel por cadastrar um novo cd
     * @param StoreUpdateAlunoFormRequest $request => dados a virem do formulario
     */
    public function store()
    {
        
    }

    /**
     * Metodo responsavel por exibir o formulario de edicao do aluno
     * @param int $id => registro a ser exibido no formulario
     */
    public function edit(int $id)
    {
        
    }

    /**
     * Metodo responsavel por persistir os dados da edicao na base de dados
     * @param StoreUpdateAlunoFormRequest $request => Dados da requisicao
     * @param int $id => id do aluno a ser atualizado
     */
    public function update(int $id)
    {
        
    }

    /**
     * Metodo responsavel por deletar um aluno
     * @param int $id => id do aluno a ser deletado
     */
    public function destroy(int $id)
    {
        
    }
}
