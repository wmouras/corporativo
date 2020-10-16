<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    public function cep( Request $request ){

        $cep = preg_replace( '/[^0-9-]/', '', $request->id );

        $resposta = Http::get('http://ws.creadf.dev.br/api/endereco/'.$cep)->json();

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
            'endereco' => $resposta[0]['descricao_tplog']." ".$resposta[0]['nome_logradouro'],
            'cidade' => $resposta[0]['nome_cidade'],
            'fk_id_bairro' => $resposta[0]['fk_bairro'],
            'fk_id_cidade' => $resposta[0]['fk_cidade'],
            'fk_id_tipologradouro' => $resposta[0]['fk_tipologradouro'],
            'fk_id_logradouro' => $resposta[0]['fk_logradouro'],
            'estado' => $resposta[0]['descricao_uf'],
            'bairro' => $resposta[0]['nome_bairro']];

        return response()->json($endereco);
    }
}
