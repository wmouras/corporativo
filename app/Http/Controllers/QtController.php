<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuadroTecnico;
use Illuminate\Support\Facades\Crypt;

class QtController extends Controller
{
    public function getListaEmpresaProfissional(Request $request)
    {

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $qt = new QuadroTecnico();
        return $qt->getListaEmpresaQuadro($idPessoa);
    }

    public function salvarQuadroTecnico(Request $request)
    {

        dd($request->all());

    }

    public function ExcluirQuadroTecnico()
    {
    }
}
