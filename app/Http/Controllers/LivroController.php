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
        $livro = Livro::with('material', 'autores')->find($id);
        dd($livro);
    }

    /**
     * Metodo responsavel por cadastrar novo aluno
     * @param LivroFormRequest $request => dados a virem do formulario
     */
    public function store(LivroFormRequest $request)
    {
        //dd($request);
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
        $livro->titulo = htmlspecialchars($request->titulo);
        $livro->volume = $request->volume;
        $livro->ano_publicacao = $request->ano_publicacao;
        $livro->edicao = $request->edicao;
        $livro->isbn = $request->isbn;
        $livro->editora = $request->editora;
        $livro->material_id = $material->id_material;
        $livro->save();

        //Inserindo o autor 1
        //verificando se autor existe
        if($autor = Autor::where('nome', 'like', '%'. $request->autor .'%')->first()) {
            $livro->autores()->attach($autor->id_autor);
        } else {
            $autor = new Autor();
            $autor->nome = $request->autor;
            $autor->cota_autor = random_int(30, 500);
            $autor->save();

            $livro->autores()->attach($autor->id_autor);
        }
        
        //inserindo outros autores ao livro
        $this->inserirAutoresLivro($livro, $autores);
        
        return redirect()->route('listagem-livro');

    }

    /**
     * Metodo responsavel por inserir outros autores no livro
     * @param Livro $livro => livro a ser inserido
     * @param array $autores  => autores a serem associados ao livro
     */
    private function inserirAutoresLivro($livro, $autores) {
        foreach($autores as $author) {
            if (!is_null($author) && trim($author) !== '') { // Verifica se o nome do autor não é nulo ou vazio
                if($existingAuthor = Autor::where('nome', 'like', '%'. $author .'%')->first()) {
                    $livro->autores()->attach($existingAuthor->id_autor);
                } else {
                    $newAuthor = new Autor();
                    $newAuthor->nome = $author;
                    $newAuthor->cota_autor = random_int(30, 500);
                    $newAuthor->save();
                    $livro->autores()->attach($newAuthor->id_autor);
                }
            }
        }
    }
    

    /**
     * Metodo responsavel por exibir o formulario de edicao do aluno
     * @param int $id => registro a ser exibido no formulario
     */
    public function edit(int $id)
    {
        if(!$livro = Livro::with('material', 'autores')->find($id)) {
            return back();
        }

        $autores = $livro->autores;

        return view('pages/cadastro/livro-edit', compact('livro', 'autores'));
    }

    /**
     * Metodo responsavel por persistir os dados da edicao na base de dados
     * @param LivroFormRequest $request => Dados da requisicao
     * @param int $id => id do aluno a ser atualizado
     */
    public function update(LivroFormRequest $request, int $id)
    {
        $livro = Livro::findOrFail($id);

        $autores = $request->input('autores');

        $livro->update([
            'titulo' => $request->titulo,
            'ano_publicacao' => $request->ano_publicacao,
            'volume' => $request->volume,
            'edicao' => $request->edicao,
            'isbn' => $request->isbn,
            'editora' => $request->editora,
        ]);

        $livro->material->update([
            'data_entrada' => $request->data_entrada,
            'modo_aquisicao' => $request->modo_aquisicao,
            'qtd_material' => $request->qtd_material,
            'estante' => $request->estante
        ]);

        //apagando toda associacao entre o livro e o(s) autores ligados a ele
        $livro->autores()->delete();

        if($autor = Autor::where('nome', 'like', '%'. $request->autor .'%')->first()) {
            $livro->autores()->attach($autor->id_autor);
        } else {
            $autor = new Autor();
            $autor->nome = $request->autor;
            $autor->cota_autor = random_int(30, 500);
            $autor->save();

            $livro->autores()->attach($autor->id_autor);
        }
        
        //inserindo outros autores ao livro
        $this->inserirAutoresLivro($livro, $autores);     
        
        return redirect()->route('listagem-livro');

    }

    /**
     * Metodo responsavel por deletar um aluno
     * @param int $id => id do aluno a ser deletado
     */
    public function destroy(int $id)
    {
        $livro = Livro::find($id);

        $livro->delete();

        return redirect()->route('listagem-livro');
    }
}
