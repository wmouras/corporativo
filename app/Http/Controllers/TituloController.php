<?php

namespace App\Http\Controllers;

use App\Models\RegistroProfissional;
use App\Models\Titulo;
use App\Models\TituloConfea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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

    public function salvarTituloProfissional(Request $request)
    {

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $registro = new RegistroProfissional();
        $request['fk_id_registro_profissional'] = $registro->getRegistroProfissional($idPessoa)->id_registro_profissional;

        $request['data_conclusao_curso'] = alterarDataBrMysql($request['data_conclusao_curso']);
        $request['data_diploma'] = alterarDataBrMysql($request['data_diploma']);
        $result = Titulo::create($request->all());
        return response()->json(['status'=>'sucesso']);

    }

    public function excluirTituloProfissional(Request $request)
    {
        // dd($request->idTitulo);
        $res = DB::table('tb_titulo_profissional')->where('id_titulo_profissional', '=', $request->idTitulo)->delete();
        return response()->json(['status'=>'sucesso']);
    }

}
