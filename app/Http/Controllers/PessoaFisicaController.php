<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\PessoaFisica;
use App\Models\Nacionalidade;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
// use Symfony\Component\HttpFoundation\Request;
// use Livewire\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller;

class PessoaFisicaController extends Controller
{

    public function index(){
        if(Auth::user()->id == 2)
        {
            $nacionalidade = new Nacionalidade();
            $endereco = new Endereco();
            $pessoa = PessoaFisica::where('fk_id_pessoa', 12)->get()[0];
            $pessoa->fk_id_pessoa = Crypt::encryptString($pessoa->fk_id_pessoa);
            // $pessoa->listaUf = $endereco->;

            return view('pf/index', ['pessoa' => $pessoa] );
        }
        else
        {
            return $this->lista();
        }
    }

    public function lista(){

        // dd( PessoaFisica::all() );
        $pfs = PessoaFisica::select('fk_id_pessoa', 'identidade', 'nome', 'cpf')->take(20)->get();
        foreach($pfs as $pf)
        {
            $pf->fk_id_pessoa = Crypt::encryptString($pf->fk_id_pessoa);
            $p[] = $pf;
        }

        return view('pf/listapessoafisica', ['pfs' => $p]);

    }

    public function listaNacionalidade()
    {
        $nacionalidade = new Nacionalidade();
        return response()->json($nacionalidade->listaNacionalidade());
    }

    public function salvar( HttpRequest $request ){

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $data_emissao_identidade = alterarDataBrMysql($request->data_emissao_identidade);
        $data_nascimento = alterarDataBrMysql($request->data_nascimento);
        $cpf = preg_replace( "/[^0-9]/", "", $request->cpf );
        $titulo_eleitor = preg_replace("/[^0-9]/", "", $request->titulo_eleitor);
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['fk_id_pessoa' => $idPessoa]);
        $request->merge(['titulo_eleitor' => $titulo_eleitor]);
        $request->merge(['cpf' => $cpf]);
        $request->merge(['data_emissao_identidade' => $data_emissao_identidade]);
        $request->merge(['data_nascimento' => $data_nascimento]);


        dd($request->all());

        $result = PessoaFisica::updateOrCreate($request->all(), ['fk_id_pessoa' => $idPessoa]);
        dd($result);
    }

    public function dados($id){

        $client = new Client();
        $idPessoa = Crypt::decryptString($id);

        $nacionalidade = new Nacionalidade();
        $endereco = new Endereco();


        $pf = PessoaFisica::where('fk_id_pessoa', $idPessoa)->first();
        $pf->cpf = formatarCpf( $pf->cpf);
        $pf->data_nascimento = alterarDataMysqlBr( $pf->data_nascimento );
        $pf->data_emissao_identidade = alterarDataMysqlBr( $pf->data_emissao_identidade );

        $pf->observacao = addslashes($pf->observacao);
        $pf->id_pessoa = $id;
        $pf['endereco'] = $endereco->getEnderecoPessoa($idPessoa, 1);

        // dd($pf['endereco']);

        // $pf['endereco']['cep'] = formatarCep($pf['endereco']['cep']);
        $pf['correspondencia'] = $endereco->getEnderecoPessoa($idPessoa, 1);
        if(!is_object($pf['correspondencia'])){
            $pf['correspondencia'] = false;
        }
        $pf->listaUf = json_decode($client->request('GET', 'http://ws.creadf.org.br/api/endereco/uf')->getBody());
        // $pf['cidade'] = json_decode($client->request('GET', 'http://ws.creadf.org.br/api/endereco/cidade/'.$pf->fk_id_cidade)->getBody());
        $pf->listaNacionalidade = $nacionalidade->listaNacionalidade();

        session(['id_pessoa' => $id]);

        return view('pf/pessoafisica', ['pessoafisica' => $pf]);

    }
}
