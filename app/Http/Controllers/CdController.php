<?php

namespace App\Http\Controllers;

use App\Http\Requests\CdFormRequest;
use App\Models\CD;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @param CdFormRequest $request => dados a virem do formulario
     */
    public function store(CdFormRequest $request)
    {
        $cd = new CD();
        $material = new Material();
        
        //Inserindo os dados na tabela material
        $material->data_entrada = $request->data_entrada;
        $material->tipo_material = 'cd';
        $material->modo_aquisicao = $request->modo_aquisicao;
        $material->qtd_material = $request->qtd_material;
        $material->usuario_id = Auth::user()->id_usuario;
        $material->save();

        //Inserindo os dados na tabela cd
        $cd->capacidade = $request->capacidade;
        $cd->conteudo = $request->conteudo;
        $cd->material_id = $material->id_material;
        $cd->save();

        //se tudo der certo
        return redirect()->route('listagem-cd');
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
