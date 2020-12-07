<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Models\TituloConfea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TituloController extends Controller
{
    public function getListaTitulo(Request $request)
    {
        // dd( $request['term'] );

        $listaTitulo = TituloConfea::select()->where('descricao_masculina', 'like', '%'.$request['term'].'%')->orderBy('codigo_titulo_confea')->get();
        $lista = array();

        foreach ($listaTitulo as $titulo) {
            $t['id'] = $titulo['codigo_titulo_confea'];
            $t['text'] = $titulo['descricao_masculina'];
            $lista[] = $t;
        }

        return response()->json($lista);
    }

    public function salvarTituloProfissional(Request $request){

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $result = Titulo::updateOrCreate(['fk_id_pessoa' => $idPessoa], $request->all());
        dd($result);

    }
}
