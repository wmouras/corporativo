<?php

namespace App\Http\Controllers;

use App\Models\QuadroTecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class QuadroTecnicoController extends Controller
{
    //
    public function getListaEmpresaProfissional(Request $request){

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $qt = new QuadroTecnico();
        return $qt->getListaEmpresaQuadro($idPessoa);
    }

    public function salvarQuadroTecnico(Request $request){

        dd( $request->all() );

    }

    public function ExcluirQuadroTecnico(){}
}
