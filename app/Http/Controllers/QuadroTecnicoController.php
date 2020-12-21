<?php

namespace App\Http\Controllers;

use App\Models\QuadroTecnico;
use Illuminate\Http\Request;

class QuadroTecnicoController extends Controller
{
    //

    public function getListaEmpresaProfissional(){

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));

        return QuadroTecnico::getListaEmpresaQuadro($idPessoa);
    }

    public function salvarQuadroTecnico(){}

    public function ExcluirQuadroTecnico(){}
}
