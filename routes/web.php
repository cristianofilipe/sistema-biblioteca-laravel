<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\Page\CadastroController;
use App\Http\Controllers\Page\ConsultaController;
use App\Http\Controllers\Page\EmprestimoController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\Page\RelatorioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('emprestimos', [EmprestimoController::class, 'index'])->name('emprestimos');
Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios');

Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno-store');
Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno-edit');
Route::put('/aluno/{id}', [AlunoController::class, 'update'])->name('aluno-update');

Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro-index');
Route::get('/cadastro/livro', [CadastroController::class, 'livro'])->name('cadastro-livro');
Route::get('/cadastro/tcc', [CadastroController::class, 'tcc'])->name('cadastro-tcc');
Route::get('/cadastro/revista', [CadastroController::class, 'revista'])->name('cadastro-revista');
Route::get('/cadastro/cd', [CadastroController::class, 'cd'])->name('cadastro-cd');
Route::get('/cadastro/aluno', [CadastroController::class, 'aluno'])->name('cadastro-aluno');

Route::get('/consulta', [ConsultaController::class, 'index'])->name('consulta-index');
Route::get('/consulta/livro', [ConsultaController::class, 'livro'])->name('consulta-livro');
Route::get('/consulta/tcc', [ConsultaController::class, 'tcc'])->name('consulta-tcc');
Route::get('/consulta/revista', [ConsultaController::class, 'revista'])->name('consulta-revista');
Route::get('/consulta/cd', [ConsultaController::class, 'cd'])->name('consulta-cd');
