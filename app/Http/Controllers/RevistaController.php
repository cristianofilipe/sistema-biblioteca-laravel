<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevistaFormRequest;
use App\Models\Material;
use App\Models\Revista;

class RevistaController extends Controller
{

    /**
     * Metodo responsavel por exibir uma revista
     * @param int $id => id da revista a ser exibida
     */
    public function show(int $id)
    {
        if (!$revista = Revista::with('material')->find($id)) {
            return back();
        }

        return view('pages/listagem/revista-show', ['revista' => $revista]);

    }


    /**
     * Metodo responsavel por cadastrar um livro
     * @param Request $request => dados do formulario
     */
    public function store(RevistaFormRequest $request)
    {
        $revista = new Revista();
        $material = new Material();

        $material->data_entrada = $request->data_entrada;
        $material->tipo_material = 'revista';
        $material->modo_aquisicao = $request->modo_aquisicao;
        $material->qtd_material = $request->qtd_material;
        $material->usuario_id = 1;
        $material->save();

        $revista->titulo = $request->titulo;
        $revista->subtitulo = $request->subtitulo;
        $revista->material_id = $material->id_material;
        $revista->save();


        return redirect()->route('listagem-revista');
    }

    /**
     * Metodo responsavel por exibir o formulario de edicao
     * @param int $id => id da revista a ser editado
     */
    public function edit(int $id)
    {
        if (!$revista = Revista::with('material')->find($id)) {
            return back();
        }

        return view('/pages/cadastro/revista-edit', ['revista' => $revista]);
    }

    /**
     * Metodo responsavel por persistir os dados da edicao na base de dados
     * @param Request $request => Dados da requisicao
     * @param int $id => id do revista$revista a ser atualizado
     */
    public function update(RevistaFormRequest $request, int $id)
    {
        $revista = Revista::with('material')->find($id);
        $revista->titulo = $request->titulo;
        $revista->subtitulo = $request->subtitulo;
        $revista->material->data_entrada = $request->data_entrada;
        $revista->material->tipo_material = 'revista';
        $revista->material->modo_aquisicao = $request->modo_aquisicao;
        // Atualize outros campos conforme necessário
        $revista->material->save();
        $revista->save();

        return redirect()->route('listagem-revista');
    }

    /**
     * Metodo responsavel por deletar uma revista
     * @param int $id => id da revista ser deletada
     */
    public function destroy(int $id)
    {
        $revista = Revista::find($id);
        $revista->delete();

        return redirect()->route('listagem-revista');
    }
}
