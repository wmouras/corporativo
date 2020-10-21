<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    public function cep( Request $request ){

        $cep = preg_replace( '/[^0-9-]/', '', $request->id );

        $resposta = Http::get('http://ws.creadf.org.br/api/endereco/'.$cep)->json();

        // array:19 [
        //     "pk_cep" => "72140-110"
        //     "fk_tipologradouro" => 195
        //     "fk_uf" => "DF"
        //     "fk_cidade" => 1
        //     "fk_bairro" => 16
        //     "fk_logradouro" => 10458
        //     "cep_antigo" => null
        //     "pk_uf" => "DF"
        //     "descricao_uf" => "Distrito Federal"
        //     "cep1_uf" => "70000"
        //     "cep2_uf" => "72799"
        //     "pk_logradouro" => 10458
        //     "nome_logradouro" => "11"
        //     "pk_tipologradouro" => 195
        //     "descricao_tplog" => "QNJ"
        //     "pk_cidade" => 1
        //     "nome_cidade" => "Brasília"
        //     "pk_bairro" => 16
        //     "nome_bairro" => "Taguatinga Norte (Taguatinga)"
        //   ]

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
}
