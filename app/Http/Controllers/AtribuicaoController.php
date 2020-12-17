<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atribuicao;
use App\Models\AtribuicaoProfissional;
use App\Models\RegistroProfissional;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AtribuicaoController extends Controller
{

    public function getListaAtribuicao(Request $request)
    {

        $listaAtribuicao = Atribuicao::select()->where('descricao_atribuicao', 'like', '%'.$request['term'].'%')->orderBy('descricao_atribuicao')->get();
        $lista = array();

        foreach ($listaAtribuicao as $atribuicao) {
            $t['id'] = $atribuicao['codigo_atribuicao'];
            $t['text'] = $atribuicao['descricao_atribuicao'];
            $lista[] = $t;
        }
        return response()->json($lista);
    }

    public function salvarAtribuicaoProfissional(Request $request)
    {
        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $registro = new RegistroProfissional();
        $request['fk_id_registro_profissional'] = $registro->getRegistroProfissional($idPessoa)->id_registro_profissional;

        $result = AtribuicaoProfissional::create($request->all());
        return response()->json(['status'=>'sucesso', 'msg'=>'Atribuição incluída com sucesso.']);
    }

    public function excluirTituloProfissional(Request $request)
    {
        // dd($request->idTitulo);
        $res = DB::table('tb_titulo_profissional')->where('id_titulo_profissional', '=', $request->idTitulo)->delete();
        return response()->json(['status'=>'sucesso']);
    }
}
