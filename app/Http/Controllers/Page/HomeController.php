<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Material;

class HomeController extends Controller
{
    public function index()
    {
        $totalMaterial = Material::count();
        
        return view('pages/home', compact('totalMaterial'));
    }
}
