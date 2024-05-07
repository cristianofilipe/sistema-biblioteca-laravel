<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/autors', function() {
    $autores = [
        ['nome' => 'Pepetela', 'cota' => 1734],
        ['nome' => 'Agostinho', 'cota' => 3845],
        ['nome' => 'Kiosaki', 'cota' => 790]
    ];

    return response()->json($autores);
});

Route::get('/livros', [ApiController::class, 'livro_emprestimo']);
