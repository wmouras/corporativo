<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\PessoaFisica;
use App\Models\Nacionalidade;
use App\Models\Parentesco;
use App\Models\QuadroTecnico;
use App\Models\Titulo;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PessoaFisicaController extends Controller
{

    public function index(){
        if(Auth::user()->id == 2)
        {
            $nacionalidade = new Nacionalidade();
            $endereco = new Endereco();
            $pessoa = PessoaFisica::where('fk_id_pessoa', 12)->get()[0];
            $pessoa['idPessoa'] = Crypt::encryptString($pessoa->fk_id_pessoa);

            // dd( $pessoa );
            // $pessoa->listaUf = $endereco->;
            session(['admin' => true]);

            return view('pf/index', ['pessoa' => $pessoa] );

        }
        else
        {
            session(['admin' => false]);
            return $this->lista();
        }
    }

    public function lista(){

        // dd( PessoaFisica::all() );
        $pfs = PessoaFisica::select('fk_id_pessoa', 'identidade', 'nome', 'cpf')->take(20)->get();
        foreach($pfs as $pf)
        {
            $pf['idPessoa'] = Crypt::encryptString($pf->fk_id_pessoa);
            $p[] = $pf;
        }

        return view('pf/listapessoafisica', ['pfs' => $p]);

    }

    public function listaNacionalidade()
    {
        $nacionalidade = new Nacionalidade();
        return response()->json($nacionalidade->listaNacionalidade());
    }

    public function salvarPessoaFisica( Request $request ){

        $data_emissao_identidade = alterarDataBrMysql($request->data_emissao_identidade);
        $data_nascimento = alterarDataBrMysql($request->data_nascimento);
        $request['titulo_eleitor'] = validarTituloEleitor($request->titulo_eleitor);
        $request['cpf'] = preg_replace("/[^0-9]/", "", $request->cpf);
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['data_emissao_identidade' => $data_emissao_identidade]);
        $request->merge(['data_nascimento' => $data_nascimento]);

        if(!$request->session()->get('id_pessoa')) {
            $idPessoa = null;
            $usuario['cpf'] = $request['cpf'];
            $usuario['name'] = $request['nome'];
            $usuario['email'] = $request['email'];
            $usuario['password'] = '0';
            $user = new User();
            $user->salvarUsuario( $usuario );

        } else {
            $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        }

        $request->merge(['fk_id_pessoa' => $idPessoa]);

        $parentesco = array( $request->parentesco1, $request->parentesco2);
        $modelParentesco = new Parentesco();
        $modelParentesco->salvarParentesco($parentesco, $idPessoa);

        $result = PessoaFisica::updateOrCreate(['fk_id_pessoa' => $idPessoa], $request->all());
        dd($result);
    }

    public function edicao($id = false){

        $idPessoa = Crypt::decryptString($id);

        $nacionalidade = new Nacionalidade();
        $endereco = new Endereco();
        $parentesco = new Parentesco();
        $quadro = new QuadroTecnico();
        $titulo = new Titulo();

        $pf = PessoaFisica::where('fk_id_pessoa', $idPessoa)->first();
        $pf->id_pessoa = $id;
        $pf->cpf = formatarCpf( $pf->cpf);
        $pf->data_nascimento = alterarDataMysqlBr( $pf->data_nascimento );
        $pf->data_emissao_identidade = alterarDataMysqlBr( $pf->data_emissao_identidade );
        $municipio = Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pf->fk_id_naturalidade)->json();
        $pf->titulo_eleitor = formatarTituloEleitor($pf->titulo_eleitor);
        $pf->observacao = addslashes($pf->observacao);

        if( $municipio ){
            $cidade = (object) $municipio;
            $pf->fk_id_uf = $cidade->fk_uf;
            $pf['cidades'] = json_encode( Http::get('http://ws.creadf.org.br/api/endereco/cidade/uf/'.$cidade->fk_uf)->json() );
            $pf->nome_cidade = $cidade->nome_cidade;
            $pf->fk_id_naturalidade = $cidade->pk_cidade;
        }else{
            $cidade = array();
            $pf['cidades'] = '[]';
            $pf->nome_cidade = '';
            $pf->fk_id_uf = '';
        }

        $parentesco = $parentesco->getParentescoPessoa($idPessoa);

        if( isset($parentesco[0]) )
            $pf->parentesco1 = (object) $parentesco[0];
        else
            $pf->parentesco1 = (object) array('id_parentesco' => '', 'nome' => '', 'fk_id_tipo_parentesco' => '');

        if(isset($parentesco[1]) ) {
            $pf->parentesco2 = (object) $parentesco[1];
        } else {
            $pf->parentesco2 = (object) array('id_parentesco' => '', 'nome' => '', 'fk_id_tipo_parentesco' => '');
        }

        $pf->endereco = $endereco->getEnderecoPessoa($idPessoa, 1);

        if( !is_object($pf->endereco) ){
            $pf->endereco = new Endereco();
        }else{

            $cidade = (object) Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pf->endereco->fk_id_cidade)->json();

            $pf->endereco->cidade = $cidade->nome_cidade;
            $pf->endereco->estado = $cidade->descricao_uf;
            $pf->endereco->cep = formatarCep($pf->endereco->cep);
        }

        $pf->correspondencia = $endereco->getEnderecoPessoa($idPessoa, 2);
        if(!is_object($pf->correspondencia)){
            $pf->correspondencia = new Endereco();
        }
        else{
            $cidade = (object) Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pf->correspondencia->fk_id_cidade)->json();

            $pf->correspondencia->cidade = $cidade->nome_cidade;
            $pf->correspondencia->estado = $cidade->descricao_uf;
            $pf->correspondencia->cep = formatarCep($pf->correspondencia->cep);
        }

        $pf->listaUf = json_decode(Http::get('http://ws.creadf.org.br/api/endereco/uf'));
        $pf->listaNacionalidade = $nacionalidade->listaNacionalidade();

        $quadro = new QuadroTecnico();
        $quadros = $quadro->getListaEmpresaQuadro($idPessoa);
        $qts = [];

        foreach( $quadros as $qt ){
            $quadro = $qt;
            $quadro['data_baixa'] = alterarDataMysqlBr($qt['data_baixa']);
            $quadro['data_inicio'] = alterarDataMysqlBr($qt['data_inicio']);
            $quadro['data_validade'] = alterarDataMysqlBr($qt['data_validade']);

            $qts[] = $quadro;
        }
        $pf->quadros = $qts;

        $pf->titulos = $titulo->getListaTitulo($idPessoa);
        // $pf->admin = $request->session()->get('admin');

        session(['id_pessoa' => $id]);
        return view('pf/pessoafisica', ['pessoafisica' => $pf]);

    }

    public function novo(){

        $pf = new PessoaFisica();
        $nacionalidade = new Nacionalidade();
        $pf->endereco = new Endereco();
        $pf->correspondencia = new Endereco();
        $pf->parentesco1 = new Parentesco();
        $pf->parentesco2 = new Parentesco();
        $pf->quadros = new QuadroTecnico();
        $pf->titulos = new Titulo();

        $cidade = array();
        $pf['cidades'] = '[]';
        $pf->nome_cidade = '';
        $pf->fk_id_uf = '';

        $pf->listaUf = json_decode(Http::get('http://ws.creadf.org.br/api/endereco/uf'));
        $pf->listaNacionalidade = $nacionalidade->listaNacionalidade();

        return view('pf/pessoafisica', ['pessoafisica' => $pf]);

    }
}
