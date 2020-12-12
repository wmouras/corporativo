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

        $enderecoCep = new Endereco();
        $endereco = $enderecoCep->getEnderecoCep($request->id);
        return response()->json($endereco);
    }

    public function cidade( Request $request ){
        $resposta = Http::get('http://ws.creadf.org.br/api/endereco/cidade/uf/'.$request->id)->json();
        return response()->json($resposta);
    }

    public function salvarEndereco( Request $request ){

        // dd( $request->session()->all() );

        if(is_null(session('id_pessoa')))
        {
            return false;
        }
        else
        {
            $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        }
        $endereco = $request->all();
        $empresa = $endereco['empresa'];
        $empresa['envia_correspondencia'] = 0;

        if( !$endereco['st_correspondencia'] ){
            $correspondencia = $endereco['correspondencia'];
            $correspondencia['fk_id_pessoa'] = $idPessoa;
            $correspondencia['cep'] = apenasNumero($endereco['correspondencia']['cep']);
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
        $empresa['cep'] = apenasNumero($endereco['empresa']['cep']);
        $empresa['situacao_envio_confea'] = 0;
        $empresa['fk_id_tipo_endereco'] = 1;
        // dd( $empresa );
        $result = Endereco::updateOrCreate(['id_endereco' => $empresa['id_endereco']], $empresa);

        dd($result);
    }
}
