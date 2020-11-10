<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    public function cep( Request $request ){

        $cep = preg_replace( '/[^0-9-]/', '', $request->id );

        $resposta = Http::get('http://ws.creadf.org.br/api/endereco/'.$cep)->json();

        $endereco = [
            'logradouro' => $resposta['descricao_tplog']." ".$resposta['nome_logradouro'],
            'cidade' => $resposta['nome_cidade'],
            'fk_id_bairro' => $resposta['fk_bairro'],
            'fk_id_cidade' => $resposta['fk_cidade'],
            'fk_id_tipologradouro' => $resposta['fk_tipologradouro'],
            'fk_id_logradouro' => $resposta['fk_logradouro'],
            'estado' => $resposta['descricao_uf'],
            'bairro' => $resposta['nome_bairro']];

        return response()->json($endereco);
    }

    public function cidade( Request $request ){

        $resposta = Http::get('http://ws.creadf.org.br/api/endereco/cidade/uf/'.$request->id)->json();
        return response()->json($resposta);
    }

    public function salvarEndereco( Request $request ){

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $empresa = $request->all()['empresa'];

        if( !$request->all()['st_correspondencia'] ){
            $correspondencia = $request->all()['correspondencia'];
            $correspondencia['fk_id_pessoa'] = $idPessoa;
            $correspondencia['cep'] = apenasNumero($request->all()['correspondencia']['cep']);
            $correspondencia['st_correspondencia'] = 1;
            $result = Endereco::updateOrCreate(['id_endereco' => $correspondencia['id_endereco']], $correspondencia);
        }else{
            $empresa['st_correspondencia'] = 0;
        }
        $empresa['fk_id_pessoa'] = $idPessoa;
        $empresa['cep'] = apenasNumero($request->all()['empresa']['cep']);
        $result = Endereco::updateOrCreate(['id_endereco' => $empresa['id_endereco']], $empresa);

        dd($result);
    }
}
