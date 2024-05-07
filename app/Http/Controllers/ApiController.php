<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    //Metodo responsavel por pegar todos os livros disponiveis para o emprestimo
    public function livro_emprestimo(Request $request)
    {
        $livros = Livro::whereHas('material', function($query) {
            $query->where('qtd_material', '>', 2);
        })->where('titulo', 'like', '%'.$request->titulo.'%')
        ->get(['titulo']);
        
        return response()->json($livros);
    }

}
