<?php

namespace App\Http\Controllers;

use App\Http\Requests\TccFormRequest;
use App\Models\Material;
use App\Models\TCC;
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
     * @param TccFormRequest $request => dados a virem do formulario
     */
    public function store(TccFormRequest $request)
    {
        $tcc = new TCC();
        $material = new Material();

        $material->data_entrada = $request->data_entrada;
        $material->estante = $request->estante;
        $material->save();

        $tcc->tema = $request->tema;
        $tcc->orientador = $request->orientador;
        
        foreach($request->autores as $autor) {
            if(!is_null($autor)) {
                $tcc->autores()->create(['nome' => $autor]);
            }
        }

        $tcc->save();

        return redirect()->route('listagem-tcc');
        
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
