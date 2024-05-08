<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Emprestimo;
use App\Models\Material;
use App\Models\Visitante;

class HomeController extends Controller
{
    public function index()
    {
        $total = [
            'material' => Material::count(),
            'emprestimo' => Emprestimo::count(),
            'consulta' => Consulta::count(),
            'visitante' => Visitante::count()
        ];
        
        return view('pages/home', compact('total'));
    }
}
