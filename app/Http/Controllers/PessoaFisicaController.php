<?php

namespace App\Http\Controllers;

use App\Models\Atribuicao;
use App\Models\Endereco;
use App\Models\PessoaFisica;
use App\Models\Nacionalidade;
use App\Models\Parentesco;
use App\Models\Pessoa;
use App\Models\QuadroTecnico;
use App\Models\Titulo;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PessoaFisicaController extends Controller
{

    public function index()
    {

        if (Auth::user()->id == 1)
        {
            session(['admin' => true]);
            return $this->lista();
        }
        else
        {
            // dd( Auth::user()->id );
            $pessoa = PessoaFisica::where('fk_id_pessoa', Auth::user()->id)->get()[0];
            $pessoa['idPessoa'] = Crypt::encryptString($pessoa->fk_id_pessoa);

            // dd( $pessoa );
            // $pessoa->listaUf = $endereco->;
            session(['admin' => false]);
            return view('pf/index', ['pessoa' => $pessoa, 'admin' => false, 'editar' => 'disabled']);
        }
    }

    public function lista(Request $request = null){

        // dd( PessoaFisica::all() );
        $pfs = PessoaFisica::select('tb_pessoa_fisica.fk_id_pessoa', 'identidade', 'nome', 'cpf', 'numero_carteira', 'users.email as email')
            ->join('corporativo.tb_registro_profissional', 'tb_registro_profissional.fk_id_pessoa', '=', 'tb_pessoa_fisica.fk_id_pessoa')
            ->join('corporativo.users', 'users.id', '=', 'tb_pessoa_fisica.fk_id_pessoa')
            ->take(25)->orderByDesc('tb_pessoa_fisica.fk_id_pessoa')->get();

        foreach($pfs as $pf)
        {
            $pf['idPessoa'] = Crypt::encryptString($pf->fk_id_pessoa);
            $p[] = $pf;
        }

        return view('pf/listapessoafisica', ['pfs' => $p, 'admin' => true, 'editar' => '']);

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
            $user = new User();
            $pessoa = new Pessoa();
            $idPessoa = null;
            $cpf = $request['cpf'];
            $usuario['name'] = $request['nome'];
            $usuario['email'] = $request['email'];
            $usuario['password'] = Hash::make($user->gerarSenhaAleatoria($cpf));
            $idUsuario = $user->salvarUsuario($usuario);

            $pf['fk_id_user'] = $idUsuario;
            $pf['id_pessoa'] = null;
            $pf['tipo_pessoa'] = 1;
            $idPessoa = $pessoa->salvarPessoa($pf);
            $request->merge(['fk_id_pessoa' => $idPessoa]);
            session(['id_pessoa' => Crypt::encryptString($idPessoa)]);

        } else {
            $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        }

        try{

            $request->merge(['fk_id_pessoa' => $idPessoa]);
            $result = PessoaFisica::updateOrCreate(['fk_id_pessoa' => $idPessoa], $request->all());

            $parentesco = array( $request->parentesco1, $request->parentesco2);
            $modelParentesco = new Parentesco();
            $modelParentesco->salvarParentesco($parentesco, $idPessoa);

            return response()->json(array('status'=>'success', 'msg'=>'Profissional cadastrado com sucesso.' ));

            // return redirect()->route('pessoafisica.edit', ['id'=>$request->session()->get('id_pessoa')])->with('suscesso', 'You have no permission for this page!');

        }catch(QueryException $e){

        }

    }

    public function edicao(Request $request){

        session(['id_pessoa' => $request->id]);
        $idPessoa = Crypt::decryptString($request->id);

        $nacionalidade = new Nacionalidade();
        $endereco = new Endereco();
        $parentesco = new Parentesco();
        $quadro = new QuadroTecnico();
        $titulo = new Titulo();
        $pessoa = new PessoaFisica();

        $pf = $pessoa->getPessoaFisica($idPessoa);

        $pf->id_pessoa = $request->id;
        $pf->cpf = formatarCpf( $pf->cpf);
        $pf->data_nascimento = alterarDataMysqlBr( $pf->data_nascimento );
        $pf->data_emissao_identidade = alterarDataMysqlBr( $pf->data_emissao_identidade );
        $municipio = Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pf->fk_id_naturalidade)->json();
        $pf->titulo_eleitor = formatarTituloEleitor($pf->titulo_eleitor);
        $pf->observacao = addslashes($pf->observacao);

        if( $municipio ){
            $cidade = (object) $municipio;
            $pf->fk_id_uf = $cidade->fk_uf;
            $pf['cidades'] = json_encode(Http::get('http://ws.creadf.org.br/api/endereco/cidade/uf/'.$cidade->fk_uf)->json());
            $pf->nome_cidade = $cidade->nome_cidade;
            $pf->fk_id_naturalidade = $cidade->pk_cidade;
        } else {
            $cidade = array();
            $pf['cidades'] = '[]';
            $pf->nome_cidade = '';
            $pf->fk_id_uf = '';
        }

        $parentesco = $parentesco->getParentescoPessoa($idPessoa);

        if (isset($parentesco[0])) {
            $pf->parentesco1 = (object) $parentesco[0];
        } else {
            $pf->parentesco1 = (object) array('id_parentesco' => '', 'nome' => '', 'fk_id_tipo_parentesco' => '');
        }

        if (isset($parentesco[1])) {
            $pf->parentesco2 = (object) $parentesco[1];
        } else {
            $pf->parentesco2 = (object) array('id_parentesco' => '', 'nome' => '', 'fk_id_tipo_parentesco' => '');
        }

        $pf->endereco = $endereco->getEnderecoPessoa($idPessoa, 1);

        if(!$pf->endereco){
            $pf->endereco = new Endereco();
        }else{
            $cidade = (object) Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pf->endereco->fk_id_cidade)->json();

            $pf->endereco->cidade = $cidade->nome_cidade;
            $pf->endereco->estado = $cidade->descricao_uf;
            $pf->endereco->cep = formatarCep($pf->endereco->cep);
        }

        $pf->correspondencia = $endereco->getEnderecoPessoa($idPessoa, 2);
        if(!$pf->correspondencia){
            $pf->correspondencia = new Endereco();
        }
        else
        {
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

        $qts = [];
        foreach ($quadros as $qt) {
            $quadro = $qt;
            $quadro['data_baixa'] = alterarDataMysqlBr($qt['data_baixa']);
            $quadro['data_inicio'] = alterarDataMysqlBr($qt['data_inicio']);
            $quadro['data_validade'] = alterarDataMysqlBr($qt['data_validade']);

            $qts[] = $quadro;
        }
        $pf->quadros = $qts;

        $pf->titulos = $titulo->getListaTitulo($idPessoa);

        $atribuicao = new Atribuicao();
        $pf->atribuicoes = $atribuicao->getAtribuicaoProfissional($idPessoa);

        if( $request->session()->get('admin', 0) )
        {
            return view('pf/pessoafisica', ['pessoafisica' => $pf, 'admin' => true, 'editar' => '']);
        }else
        {
            return view('pf/pessoafisica', ['pessoafisica' => $pf, 'admin' => false, 'editar' => 'disabled']);
        }

        // ['pessoa' => $pessoa, ]

        session(['id_pessoa' => $id]);
        return view('pf/pessoafisica', ['pessoafisica' => $pf]);

    }

    public function novo(Request $rquest){

        session(['id_pessoa' => null]);
        // dd(session('id_pessoa'));
        $pf = new PessoaFisica();
        $nacionalidade = new Nacionalidade();
        $pf->endereco = new Endereco();
        $pf->correspondencia = new Endereco();
        $pf->parentesco1 = new Parentesco();
        $pf->parentesco2 = new Parentesco();
        // $pf->quadros = new QuadroTecnico();
        // $pf->titulos = new Titulo();
        $pf->quadros = array();
        $pf->titulos = array();
        $pf->atribuicoes = array();

        $cidade = array();
        $pf['cidades'] = '[]';
        $pf->nome_cidade = '';
        $pf->fk_id_uf = '';

        $pf->listaUf = json_decode(Http::get('http://ws.creadf.org.br/api/endereco/uf'));
        $pf->listaNacionalidade = $nacionalidade->listaNacionalidade();
        return view('pf/pessoafisica', ['pessoafisica' => $pf, 'admin' => true, 'editar' => '']);

    }

    public function enviaRegistroConfea(Request $request)
    {

        $idPessoa = $request->session()->get('id_pessoa');

        $pessoafisica = new PessoaFisica();
        $profissional = $pessoafisica->getPessoaFisica($idPessoa);

        dd($profissional);

        $dadoProfissional = array(
            'SISUSU_LGN' => '',
            'DTAALT' => '',
            'DTAVALPROV' => '',
            'dtaativa' => '',
            'DTARECAD' => '',
            'DTAFAL' => '',
            'TPORNP' => '',
            'CRECAD_COD' => '',
            'CRECAD_CODREG' => '',
            'NROPROT' => '',
            'TPOPRF' => '',
            'SISIDTPRF_NROCPF' => '',
            'NME' => '',
            'TPOSEX' => '',
            'ESTCIV' => '',
            'NMEMAE' => '',
            'NMEPAI' => '',
            'DSCNAC' => '',
            'DSCNAT' => '',
            'UFNAT' => '',
            'PISNAC' => '',
            'DTANSC' => '',
            'TPONECESP' => '',
            'NROIDT' => '',
            'DTAEXPIDT' => '',
            'ORGEXPIDT' => '',
            'TPOSNG' => '',
            'TPOFRH' => '',
            'NROTITELE' => '',
            'ZONTITELE' => '',
            'SECTITELE' => '',
            'DSCMUNTITELE' => '',
            'UFTITELE' => '',
            'TPOREG' => '',
            'EML' => '',
            'HPG' => '',
            'TPOENDCOR' => '',
            'DTAREGCRE' => '',
            'NROREGCRE' => '',
            'NROCRTCRE' => '',
            'TPONROIMPCRT' => '',
            'DTAINIREG' => '',
            'DTAFIMREG' => '',
            'PRFCAD_CODRNPAST' => '',
            'CPFAST' => '',
            'NMEAST' => '',
            'DTAINIVCLAST' => '',
            'DTAFIMVCLAST' => '');

    }


}
