<?php

namespace App\Http\Controllers;

use App\Http\Requests\TccFormRequest;
use App\Models\Curso;
use App\Models\Material;
use App\Models\TCC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TccController extends Controller
{
    /**
     * Metodo responsavel por exibir um aluno
     * @param int $id => id do aluno a ser exibido
     */
    public function show(int $id)
    {
        $tcc = TCC::with('autores', 'curso', 'material')->find($id);

        dd($tcc);
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
        $material->tipo_material = 'tcc';
        $material->usuario_id = Auth::user()->id_usuario;
        $material->save();

        $tcc->tema = $request->tema;
        $tcc->orientador = $request->orientador;
        $tcc->curso_id = $request->curso;
        $tcc->material_id = $material->id_material;
        $tcc->ano = $request->ano;
        $tcc->save();
        
        $tcc->autores()->create(['nome' => $request->autor]);

        if($request->autores) {
            foreach($request->autores as $autor) {
                if(!is_null($autor)) {
                    $tcc->autores()->create(['nome' => $autor, 'tcc_id' => $tcc->id_tcc]);
                }
            }
        }

        return redirect()->route('listagem-tcc');
        
    }

    /**
     * Metodo responsavel por exibir o formulario de edicao do aluno
     * @param int $id => registro a ser exibido no formulario
     */
    public function edit(int $id)
    {
        if (!$tcc = TCC::with('material', 'autores')->find($id)) {
            return back();
        }

        $cursos = Curso::all('id_curso', 'nome');

        $autores = $tcc->autores;
        return view('/pages/cadastro/tcc-edit', compact('tcc', 'autores', 'cursos'));
    }

    /**
     * Metodo responsavel por persistir os dados da edicao na base de dados
     * @param TccFormRequest $request => Dados da requisicao
     * @param int $id => id do aluno a ser atualizado
     */
    public function update(TccFormRequest $request, int $id)
    {
        $tcc = TCC::findOrFail($id);

        $tcc->update([
            'tema' => $request->tema,
            'orientador' => $request->orientador,
            'ano' => $request->ano,
            'curso_id' => $request->curso
        ]);

        $tcc->material->update([
            'data_entrada' => $request->data_entrada,
            'estante' => $request->estante
        ]);

        $autores = $request->autores;

        $tcc->autores()->delete();
        $tcc->autores()->create(['nome' => $request->autor]);
            

        if(count($autores) > 0) {
            foreach ($autores as $autor) {
                if(!is_null($autor)) {
                    $tcc->autores()->create(['nome' => $autor]);
                }
            }
        }

        return redirect()->route('listagem-tcc');
    }

    /**
     * Metodo responsavel por deletar um aluno
     * @param int $id => id do aluno a ser deletado
     */
    public function destroy(int $id)
    {
        $tcc = TCC::find($id);
        $tcc->delete();

        return redirect()->route('listagem-tcc');
    }
}
