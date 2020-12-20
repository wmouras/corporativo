<?php

use App\Http\Controllers\AtribuicaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\PessoaFisicaController;
use App\Http\Controllers\PessoaJuridicaController;
use App\Http\Controllers\TituloController;

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

    Route::get('/pessoajuridica/listatipo', [PessoaJuridicaController::class, 'listaTipoEmpresa']);
    Route::get('/pessoajuridica/listatpestabelecimento', [PessoaJuridicaController::class, 'listaTipoEstabelecimento']);
    Route::get('/pessoajuridica/salvar', [PessoaJuridicaController::class, 'salvarPessoaJuridica'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pj/pessoajuridica/lista', [PessoaJuridicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pj/pessoajuridica/lista', [PessoaJuridicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pj/pessoafisica', [PessoaFisicaController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('pessoafisica');

    Route::get('/pessoafisica/nacionalidade', [PessoaFisicaController::class, 'listaNacionalidade'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pessoafisica/envioregistro', [PessoaFisicaController::class, 'enviarRegistroProfissional'])->middleware(['auth:sanctum', 'verified']);


    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('pj/pessoajuridica', function () {
        return view('pj/listapessoajuridica');
    })->middleware(['verified']);

    Route::get('/pj/pessoajuridica/dados/{id}', [PessoaJuridicaController::class, 'dados'])->name('pessoajuridica.edit')->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica/edicao/{id}', [PessoaFisicaController::class, 'edicao'])->name('pessoafisica.edit')->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica/novo', [PessoaFisicaController::class, 'novo'])->name('pessoafisica.novo')->middleware(['auth:sanctum', 'verified']);
    Route::get('/endereco/cep/{id}', [EnderecoController::class, 'cep'])->name('endereco.get')->middleware(['auth:sanctum', 'verified']);
    Route::get('/endereco/cidade/uf/{id}', [EnderecoController::class, 'cidade'])->name('listacidade')->middleware(['auth:sanctum', 'verified']);
    Route::post('/endereco/salvar', [EnderecoController::class, 'SalvarEndereco'])->name('endereco.update')->middleware(['auth:sanctum', 'verified']);

    Route::get('/titulo/listatitulo', [TituloController::class, 'getListaTitulo'])->name('listatitulo')->middleware(['auth:sanctum', 'verified']);
    Route::post('/titulo/salvar', [TituloController::class, 'salvarTituloProfissional'])->name('titulo.salvar')->middleware(['auth:sanctum', 'verified']);
    Route::post('/titulo/delete', [TituloController::class, 'excluirTituloProfissional'])->name('titulo.delete')->middleware(['auth:sanctum', 'verified']);

    Route::get('/atribuicao/listaatribuicao', [AtribuicaoController::class, 'getListaAtribuicao'])->name('listaatribuicao')->middleware(['auth:sanctum', 'verified']);
    Route::post('/atribuicao/salvar', [AtribuicaoController::class, 'salvarAtribuicaoProfissional'])->name('atribuicao.salvar')->middleware(['auth:sanctum', 'verified']);
    Route::post('/atribuicao/delete', [AtribuicaoController::class, 'excluirAtribuicaoProfissional'])->name('atribuicao.delete')->middleware(['auth:sanctum', 'verified']);
