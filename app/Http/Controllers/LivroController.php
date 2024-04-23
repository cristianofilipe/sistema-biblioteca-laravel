<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroFormRequest;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
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
    public function store(LivroFormRequest $request)
    {
        //Iniciar um novo livro e um novo material
        $livro = new Livro();
        $material = new Material();

        $autores = $request->input('autores');

        //Inserindo os dados na tabela material
        $material->data_entrada = $request->data_entrada;
        $material->tipo_material = 'livro';
        $material->modo_aquisicao = $request->modo_aquisicao;
        $material->qtd_material = $request->qtd_material;
        $material->usuario_id = Auth::user()->id_usuario;

        //se a quantidade de revistas for maior que 2, entao o livro esta ativo(pode ser emprestado)
        $material->ativo = ($material->qtd_material > 2) ?? false;
        $material->estante = $request->estante;
        //salvando o material
        $material->save();

        //inserirndo dados na tabela livro
        $livro->titulo = $request->titulo;
        $livro->volume = $request->volume;
        $livro->ano_publicacao = $request->ano_publicacao;
        $livro->edicao = $request->edicao;
        $livro->isbn = $request->isbn;
        $livro->editora = $request->editora;
        $livro->cdd = $request->cdd;
        $livro->material_id = $material->id_material;
        $livro->save();

        dd($autores);
        //relacionar os autores com o livro
        foreach($autores as $author) {
            $autor = Autor::all(['nome', 'cota_autor'])->where('nome', 'like', '%' . $author . '%');

            //verificando se o autor ja existe na tabela autores
            if(!$autor) {
                $cota_autor = random_int(30, 500);
                $autor = Autor::create(['nome' => $autor->nome, 'cota_autor' => $cota_autor]);
            }

            echo "<pre>";
            var_dump($autor);
            
            //Associa o autor ao livro
            //$livro->autores()->attach($autor->id_autor);
            
        }

        exit;
        
        return redirect()->route('home');

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
