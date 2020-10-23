<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PessoaFisicaController;
use App\Http\Controllers\PessoaJuridicaController;

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
    Route::post('/pf/pessoafisica/salva/', [PessoaFisicaController::class, 'salvar'])->middleware(['auth:sanctum', 'verified'])->name('pessoafisica.update');

    // Route::get('/pf/pessoafisica/salva/', function (Request $request) {
    //     dd($request);
    // });

    Route::redirect("/", "/pf/pessoafisica", 301)->name("home")->middleware(['auth:sanctum', 'verified']);
    Route::get("/", [PessoaFisicaController::class, 'index'])->name("pf")->middleware(['auth:sanctum', 'verified']);

    Route::get('/pessoajuridica/listatipo', [PessoaJuridicaController::class, 'listaTipoEmpresa']);
    Route::get('/pessoajuridica/listatpestabelecimento', [PessoaJuridicaController::class, 'listaTipoEstabelecimento']);
    Route::get('/pessoajuridica/salvar', [PessoaJuridicaController::class, 'salvar'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pj/pessoajuridica/lista', [PessoaJuridicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica/lista', [PessoaJuridicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica', [PessoaFisicaController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('pessoafisica');

    Route::get('/pessoafisica/nacionalidade', [PessoaFisicaController::class, 'listaNacionalidade'])->middleware(['auth:sanctum', 'verified']);

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('pj/pessoajuridica', function () {
        return view('pj/listapessoajuridica');
    })->middleware(['verified']);

    Route::get('/pj/pessoajuridica/dados/{id}', [PessoaJuridicaController::class, 'dados'])->name('pj.pessoajuridica.edit')->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica/dados/{id}', [PessoaFisicaController::class, 'dados'])->name('pf.pessoafisica.edit')->middleware(['auth:sanctum', 'verified']);
    Route::get('/endereco/cep/{id}', [EnderecoController::class, 'cep'])->name('endereco.get')->middleware(['auth:sanctum', 'verified']);
    Route::get('/endereco/cidade/uf/{id}', [EnderecoController::class, 'cidade'])->name('listacidade')->middleware(['auth:sanctum', 'verified']);
