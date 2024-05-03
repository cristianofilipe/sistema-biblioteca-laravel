<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Emprestimo;
use App\Models\Material;

class HomeController extends Controller
{
    public function index()
    {
        $total = [
            'material' => Material::count(),
            'emprestimos' => Emprestimo::count(),
            'relatorios' => 0,
            'funcionarios' => 0
        ];
        
        return view('pages/home', compact('total'));
    }
}
