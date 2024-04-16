<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CdController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\Page\CadastroController;
use App\Http\Controllers\Page\ListagemController;
use App\Http\Controllers\Page\EmprestimoController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\Page\LoginController;
use App\Http\Controllers\Page\RelatorioController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\TccController;
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

Route::prefix('sistema-biblioteca')->group(function() {

    Route::middleware('auth')->group(function() {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('emprestimos', [EmprestimoController::class, 'index'])->middleware('can:acesso-autorizado')->name('emprestimos');
        Route::get('relatorios', [RelatorioController::class, 'index'])->name('relatorios');


        //Rotas para cadastros
        Route::get('cadastro', [CadastroController::class, 'index'])->name('cadastro-index');
        Route::get('cadastro/livro', [CadastroController::class, 'livro'])->name('cadastro-livro');
        Route::get('cadastro/tcc', [CadastroController::class, 'tcc'])->name('cadastro-tcc');
        Route::get('cadastro/revista', [CadastroController::class, 'revista'])->name('cadastro-revista');
        Route::get('cadastro/cd', [CadastroController::class, 'cd'])->name('cadastro-cd');
        Route::get('cadastro/aluno', [CadastroController::class, 'aluno'])->name('cadastro-aluno');
        Route::get('cadastro/professor', [CadastroController::class, 'professor'])->name('cadastro-professor');

        //Rotas para listagens
        Route::prefix('listagem')->group(function() {
            Route::get('/', [ListagemController::class, 'index'])->name('listagem-index');
            Route::get('livro', [ListagemController::class, 'livro'])->name('listagem-livro');
            Route::get('tcc', [ListagemController::class, 'tcc'])->name('listagem-tcc');
            Route::get('revista', [ListagemController::class, 'revista'])->name('listagem-revista');
            Route::get('cd', [ListagemController::class, 'cd'])->name('listagem-cd');
            Route::get('alunos', [ListagemController::class, 'alunos'])->name('listagem-alunos');
            Route::get('professores', [ListagemController::class, 'professores'])->name('listagem-professores');
        });

        //Rotas para o aluno
        Route::get('/aluno/{id}', [AlunoController::class, 'show'])->name('aluno-show');
        Route::get('/aluno/editar/{id}', [AlunoController::class, 'edit'])->name('aluno-edit');
        Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno-store');
        Route::put('/aluno/{id}', [AlunoController::class, 'update'])->name('aluno-update');
        Route::delete('/aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno-destroy');

        //Rotas para a revista
        Route::get('/revista/{id}', [RevistaController::class, 'show'])->name('revista-show');
        Route::get('/revista/editar/{id}', [RevistaController::class, 'edit'])->name('revista-edit');
        Route::post('/revista', [RevistaController::class, 'store'])->name('revista-store');
        Route::put('/revista/{id}', [RevistaController::class, 'update'])->name('revista-update');
        Route::delete('/revista/{id}', [RevistaController::class, 'destroy'])->name('revista-destroy');

        //Rotas para o livro
        Route::get('/livro/{id}', [LivroController::class, 'show'])->name('livro-show');
        Route::get('/livro/editar/{id}', [LivroController::class, 'edit'])->name('livro-edit');
        Route::post('/livro', [LivroController::class, 'store'])->name('livro-store');
        Route::put('/livro/{id}', [LivroController::class, 'update'])->name('livro-update');
        Route::delete('/livro/{id}', [LivroController::class, 'destroy'])->name('livro-destroy');

        //Rotas para o cd
        Route::get('/cd/{id}', [CdController::class, 'show'])->name('cd-show');
        Route::get('/cd/editar/{id}', [CdController::class, 'edit'])->name('cd-edit');
        Route::post('/cd', [CdController::class, 'store'])->name('cd-store');
        Route::put('/cd/{id}', [CdController::class, 'update'])->name('cd-update');
        Route::delete('/cd/{id}', [CdController::class, 'destroy'])->name('cd-destroy');

        //Rotas para o professor
        Route::get('/professor/{id}', [ProfessorController::class, 'show'])->name('professor-show');
        Route::get('/professor/editar/{id}', [ProfessorController::class, 'edit'])->name('professor-edit');
        Route::post('/professor', [ProfessorController::class, 'store'])->name('professor-store');
        Route::put('/professor/{id}', [ProfessorController::class, 'update'])->name('professor-update');
        Route::delete('/professor/{id}', [ProfessorController::class, 'destroy'])->name('professor-destroy');

        //Rotas para o tcc
        Route::get('/tcc/{id}', [TccController::class, 'show'])->name('tcc-show');
        Route::get('/tcc/editar/{id}', [TccController::class, 'edit'])->name('tcc-edit');
        Route::post('/tcc', [TccController::class, 'store'])->name('tcc-store');
        Route::put('/tcc/{id}', [TccController::class, 'update'])->name('tcc-update');
        Route::delete('/tcc/{id}', [TccController::class, 'destroy'])->name('tcc-destroy');

    });

    Route::get('/login', [LoginController::class, 'index'])->withoutMiddleware('auth')->name('login');
    Route::post('/authenticate', [LoginController::class, 'auth'])->name('login-auth');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
   
    Route::view('/404', 'errors.404')->name('404');
    Route::view('/403', 'errors.403')->name('403');
});