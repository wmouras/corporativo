<?php

use App\Http\Controllers\AtribuicaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\PessoaFisicaController;
use App\Http\Controllers\PessoaJuridicaController;
use App\Http\Controllers\TituloController;
use App\Http\Controllers\QuadroTecnicoController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::post('/pf/pessoafisica/salvar', [PessoaFisicaController::class, 'salvarPessoaFisica'])->middleware(['auth:sanctum', 'verified'])->name('pessoafisica.update');

    // Route::get('/pf/pessoafisica/salva/', function (Request $request) {
    //     dd($request);
    // });

    Route::redirect("/", "/pessoa", 301)->name("home")->middleware(['auth:sanctum', 'verified']);
    Route::get("/pessoa", [PessoaController::class, 'index'])->name("pessoa")->middleware(['auth:sanctum', 'verified']);
    Route::get('/pessoa/lista', [PessoaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
    Route::post('/pessoa/lista', [PessoaController::class, 'lista'])->name('pessoa.filtro')->middleware(['auth:sanctum', 'verified']);

    Route::get('/pessoajuridica/listatipo', [PessoaJuridicaController::class, 'listaTipoEmpresa']);
    Route::get('/pessoajuridica/listatpestabelecimento', [PessoaJuridicaController::class, 'listaTipoEstabelecimento']);
    Route::post('/pessoajuridica/salvar', [PessoaJuridicaController::class, 'salvarPessoaJuridica'])->name('pessoajuridica.salvar')->middleware(['auth:sanctum', 'verified']);
    Route::get('/pj/pessoajuridica/lista', [PessoaJuridicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pj/pessoajuridica/edicao/{id}', [PessoaJuridicaController::class, 'edicao'])->name('pessoajuridica.edit')->middleware(['auth:sanctum', 'verified']);
    Route::get('/pj/pessoajuridica/novo', [PessoaJuridicaController::class, 'novo'])->name('pessoajuridica.novo')->middleware(['auth:sanctum', 'verified']);
    Route::post('/pessoajuridica/concluir', [PessoaJuridicaController::class, 'concluirPessoaJuridica'])->name('pessoajuridica.concluir')->middleware(['auth:sanctum', 'verified']);

    Route::post('/quadrotecnico/salvar', [QuadroTecnicoController::class, 'salvarQuadroTecnico'])->name('quadrotecnico.salvar')->middleware(['auth:sanctum', 'verified']);
    Route::post('/quadrotecnico/delete', [QuadroTecnicoController::class, 'excluirQuadroTecnico'])->name('quadrotecnico.delete')->middleware(['auth:sanctum', 'verified']);

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('pj/pessoajuridica', function () {
        return view('/pj/pessoajuridica/lista');
    })->middleware(['verified']);

    Route::get('/pessoafisica/nacionalidade', [PessoaFisicaController::class, 'listaNacionalidade'])->middleware(['auth:sanctum', 'verified']);
    Route::post('/pessoafisica/nome', [PessoaFisicaController::class, 'getNomeProfissional'])->name('pessoafisica.nome')->middleware(['auth:sanctum', 'verified']);
    Route::get('/pessoafisica/envioregistro', [PessoaFisicaController::class, 'enviarRegistroProfissional'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica/edicao/{id}', [PessoaFisicaController::class, 'edicao'])->name('pessoafisica.edit')->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica/novo', [PessoaFisicaController::class, 'novo'])->name('pessoafisica.novo')->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica/index', [PessoaFisicaController::class, 'index'])->name('pessoafisica.index')->middleware(['auth:sanctum', 'verified']);

    Route::get('/endereco/cep/{id}', [EnderecoController::class, 'cep'])->name('endereco.get')->middleware(['auth:sanctum', 'verified']);
    Route::get('/endereco/cidade/uf/{id}', [EnderecoController::class, 'cidade'])->name('listacidade')->middleware(['auth:sanctum', 'verified']);
    Route::post('/endereco/salvar', [EnderecoController::class, 'SalvarEndereco'])->name('endereco.update')->middleware(['auth:sanctum', 'verified']);

    Route::get('/titulo/listatitulo', [TituloController::class, 'getListaTitulo'])->name('listatitulo')->middleware(['auth:sanctum', 'verified']);
    Route::post('/titulo/salvar', [TituloController::class, 'salvarTituloProfissional'])->name('titulo.salvar')->middleware(['auth:sanctum', 'verified']);
    Route::post('/titulo/delete', [TituloController::class, 'excluirTituloProfissional'])->name('titulo.delete')->middleware(['auth:sanctum', 'verified']);

    Route::get('/atribuicao/listaatribuicao', [AtribuicaoController::class, 'getListaAtribuicao'])->name('listaatribuicao')->middleware(['auth:sanctum', 'verified']);
    Route::post('/atribuicao/salvar', [AtribuicaoController::class, 'salvarAtribuicaoProfissional'])->name('atribuicao.salvar')->middleware(['auth:sanctum', 'verified']);
    Route::post('/atribuicao/delete', [AtribuicaoController::class, 'excluirAtribuicaoProfissional'])->name('atribuicao.delete')->middleware(['auth:sanctum', 'verified']);

    Route::post('logged_in', [LoginController::class, 'authenticate'])->name("logged_in");
