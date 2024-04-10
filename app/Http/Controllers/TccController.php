<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TccController extends Controller
{
    /**
     * Metodo responsavel por exibir um aluno
     * @param int $id => id do aluno a ser exibido
     */
    public function show(int $id)
    {
        
    }

    /**
     * Metodo responsavel por cadastrar novo aluno
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
