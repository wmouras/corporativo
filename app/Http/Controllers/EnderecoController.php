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

        $empresa['envia_correspondencia'] = 0;

        // dd( $request->all()['correspondencia'] );

        if( !$request->all()['st_correspondencia'] ){
            $correspondencia = $request->all()['correspondencia'];
            $correspondencia['fk_id_pessoa'] = $idPessoa;
            $correspondencia['cep'] = apenasNumero($request->all()['correspondencia']['cep']);
            $correspondencia['envia_correspondencia'] = 1;
            $correspondencia['endereco_valido'] = 1;
            $correspondencia['fk_id_tipo_endereco'] = 2;
            $correspondencia['situacao_envio_confea'] = 0;

            $result = Endereco::updateOrCreate(['id_endereco' => $correspondencia['id_endereco']], $correspondencia);
        }else{
            $empresa['envia_correspondencia'] = 1;
        }
        $empresa['fk_id_pessoa'] = $idPessoa;
        $empresa['endereco_valido'] = 1;
        $empresa['cep'] = apenasNumero($request->all()['empresa']['cep']);
        $empresa['situacao_envio_confea'] = 0;
        $empresa['fk_id_tipo_endereco'] = 1;
        $result = Endereco::updateOrCreate(['id_endereco' => $empresa['id_endereco']], $empresa);

        dd($result);
    }
}
