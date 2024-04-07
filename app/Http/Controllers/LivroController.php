<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    public function store(Request $request)
    {
        $livro = new Livro();
        
        
        return redirect()->route('home');
    }
}
