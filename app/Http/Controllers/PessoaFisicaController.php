<?php

namespace App\Http\Controllers;

use App\Models\Atribuicao;
use App\Models\Endereco;
use App\Models\PessoaFisica;
use App\Models\Nacionalidade;
use App\Models\Parentesco;
use App\Models\Pessoa;
use App\Models\QuadroTecnico;
use App\Models\RegistroProfissional;
use App\Models\Telefone;
use App\Models\Titulo;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
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

        // dd( Auth::user()->id );
        $pessoa = PessoaFisica::where('fk_id_pessoa', Auth::user()->id)->get()[0];
        $pessoa['id_pessoa'] = Crypt::encryptString($pessoa->fk_id_pessoa);
        return view('pf/index', ['pessoa' => $pessoa]);

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

    public function emitirCrq(Request $request)
{

        // retreive all records from db
        $data = $this->edicao($request, true);

        // share data to view
        view()->share('pessoafisica', $data);

        PDF::setPaper('A4', 'portrait');
        $pdf = PDF::loadView('pf.pdf_crq', $data)->setOptions(['defaultFont' => 'sans-serif']);

        // download PDF file with download method
        return $pdf->download('pdf_registro.pdf');

}

    public function imprimirPDF(Request $request){

        // retreive all records from db
        $data = $this->edicao($request, true);

        // share data to view
        view()->share('pessoafisica',$data);

        PDF::setPaper('A4', 'portrait');
        $pdf = PDF::loadView('pf.pdf_registro', $data)->setOptions(['defaultFont' => 'sans-serif']);

        // download PDF file with download method
        return $pdf->download('pdf_registro.pdf');

    }

    public function edicao(Request $request, $pdf = false){

        session(['id_pessoa' => $request->id]);
        $idPessoa = Crypt::decryptString($request->id);

        $nacionalidade = new Nacionalidade();
        $endereco = new Endereco();
        $parentesco = new Parentesco();
        $quadro = new QuadroTecnico();
        $titulo = new Titulo();
        $pessoafisica = new PessoaFisica();
        $tel = new Telefone();

        $pf = $pessoafisica->getPessoaFisica($idPessoa);
        $pf->id_pessoa = $request->id;
        $pf->cpf = formatarCpf( $pf->cpf);
        $pf->data_nascimento = alterarDataMysqlBr( $pf->data_nascimento );
        $pf->data_emissao_identidade = alterarDataMysqlBr( $pf->data_emissao_identidade );
        $municipio = Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pf->fk_id_naturalidade)->json();
        $pf->titulo_eleitor = formatarTituloEleitor($pf->titulo_eleitor);
        $pf->observacao = addslashes($pf->observacao);
        $pf->telefone = $tel->getTelefonePessoa($idPessoa);

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
        $pf->estadocivil = '1';

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

        if($pdf === true){
            return $pf;
        }

        if( $request->session()->get('admin', 0) )
        {
            return view('pf/pessoafisica', ['pessoafisica' => $pf, 'admin' => true, 'editar' => '']);
        }else
        {
            return view('pf/pessoafisica', ['pessoafisica' => $pf, 'admin' => false, 'editar' => 'disabled']);
        }

        return view('pf/pessoafisica', ['pessoafisica' => $pf]);

    }

    public function salvarPessoaFisica( Request $request ){

        // if(Auth::id() != ){

        // }

        $data_emissao_identidade = alterarDataBrMysql($request->data_emissao_identidade);
        $data_nascimento = alterarDataBrMysql($request->data_nascimento);
        $request['titulo_eleitor'] = validarTituloEleitor($request->titulo_eleitor);
        $request['cpf'] = preg_replace("/[^0-9]/", "", $request->cpf);
        $request['pis_pasep'] = preg_replace("/[^0-9]/", "", $request->pis_pasep);
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['data_emissao_identidade' => $data_emissao_identidade]);
        $request->merge(['data_nascimento' => $data_nascimento]);

        if(!$request->session()->get('id_pessoa')) {
            $user = new User();
            $pessoa = new Pessoa();
            $idPessoa = null;
            $usuario['name'] = $request['nome'];
            $usuario['email'] = $request['email'];
            $usuario['password'] = Hash::make('12345678');//$user->gerarSenhaAleatoria($request['cpf']));
            $idUsuario = $user->salvarUsuario($usuario);

            $pf['fk_id_user'] = $idUsuario;
            $pf['id_pessoa'] = null;
            $pf['tipo_pessoa'] = 1;
            $idPessoa = $pessoa->salvarPessoa($pf);
            $request->merge(['fk_id_pessoa' => $idPessoa]);
            session(['id_pessoa' => Crypt::encryptString($idPessoa)]);

        } else {
            $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
            $user = new User();
            $pss = new Pessoa();
            $pessoa = $pss->getPessoa($idPessoa);
            $usuario['id'] = $pessoa->fk_id_user;
            $usuario['name'] = $request['nome'];
            $usuario['email'] = $request['email'];
            $usuario['password'] = Hash::make('12345678');
            $user = User::updateOrCreate(['id' => $pessoa->fk_id_user], $usuario);
            $person['fk_id_user'] = $user->id;
            $person['tipo_pessoa'] = '1';
            $peopersonple['id_pessoa'] = $pessoa->id_pessoa;
            Pessoa::updateOrCreate(['id_pessoa' => $pessoa->id_pessoa], $person);

        }

        try{

            $request->merge(['fk_id_pessoa' => $idPessoa]);
            $result = PessoaFisica::updateOrCreate(['fk_id_pessoa' => $idPessoa], $request->all());

            $parentesco = array( $request->parentesco1, $request->parentesco2);
            $modelParentesco = new Parentesco();
            $modelParentesco->salvarParentesco($parentesco, $idPessoa);

            $registro = new RegistroProfissional();
            $registro->setRegistroProfissional($idPessoa, false);

            return response()->json(array('status'=>'success', 'msg'=>'Profissional cadastrado com sucesso.' ));

            // return redirect()->route('pessoafisica.edit', ['id'=>$request->session()->get('id_pessoa')])->with('suscesso', 'You have no permission for this page!');

        }catch(QueryException $e){
            dd( $e );
        }

    }

    public function novo(Request $rquest){

        session(['id_pessoa' => null]);
        $pf = new PessoaFisica();
        $nacionalidade = new Nacionalidade();
        $pf->endereco = new Endereco();
        $pf->correspondencia = new Endereco();
        $pf->parentesco1 = new Parentesco();
        $pf->parentesco2 = new Parentesco();
        $pf->quadros = array();
        $pf->titulos = array();
        $pf->atribuicoes = array();
        $telefone = new Telefone();

        $cidade = array();
        $pf['cidades'] = '[]';
        $pf->nome_cidade = '';
        $pf->fk_id_uf = '';
        $pf->telefone = [$telefone, $telefone];

        $pf->listaUf = json_decode(Http::get('http://ws.creadf.org.br/api/endereco/uf'));
        $pf->listaNacionalidade = $nacionalidade->listaNacionalidade();
        return view('pf/pessoafisica', ['pessoafisica' => $pf, 'admin' => true, 'editar' => '']);

    }

    public function enviarRegistroProfissional(Request $request)
    {

        $idPessoa = Crypt::decrypt($request->session()->get('id_pessoa'));
        $endereco = new Endereco();
        $pessoafisica = new PessoaFisica();
        $registro = new RegistroProfissional();
        $parentesco = new Parentesco();
        $nacionalidade = new Nacionalidade();

        $profissional = $pessoafisica->getPessoaFisica($idPessoa);
        $contato = $endereco->getEnderecoPessoa($idPessoa);
        $parente = $parentesco->getParentescoPessoa($idPessoa);
        $idRegistro = RegistroProfissional::where()->max('id_registro_profissional');
        $carteira = ($idRegistro+1).'/D-DF';
        $registro->setRegistroProfissional($idPessoa, $carteira);
        $nac = $nacionalidade->getNacionalidade($profissional->fk_cd_nacionalidade);
        $municipio = Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pf->fk_id_naturalidade)->json();

        dd($contato);

        $dadoProfissional = array(
            'SISUSU_LGN' => '',
            'DTAALT' => date('Y-m-d'),
            'DTAVALPROV' => '',
            'dtaativa' => date('Y-m-d'),
            'DTARECAD' => '',
            'DTAFAL' => '',
            'TPORNP' => '',
            'CRECAD_COD' => '07',
            'CRECAD_CODREG' => '07',
            'NROPROT' => ($idRegistro+1),
            'TPOPRF' => '',
            'SISIDTPRF_NROCPF' => $profissional->cpf,
            'NME' => $profissional->nome,
            'TPOSEX' => $profissional->sexo,
            'ESTCIV' => '',
            'NMEMAE' => $parente[0]->nome,
            'NMEPAI' => $parente[1]->nome,
            'DSCNAC' => $nac['nacionalidade'],
            'DSCNAT' => $municipio['nome_cidade'],
            'UFNAT' => $municipio['fk_uf'],
            'PISNAC' => $nac['nacionalidade'],
            'DTANSC' => $profissional->data_nascimento,
            'TPONECESP' => '',
            'NROIDT' => $profissional->identidade,
            'DTAEXPIDT' => $profissional->data_emissao_identidade,
            'ORGEXPIDT' => '',
            'TPOSNG' => $profissional->tipo_sangue,
            'TPOFRH' => $profissional->tipo_sangue,
            'NROTITELE' => $profissional->titulo_eleitor,
            'ZONTITELE' => $profissional->zona_titulo_eleitor,
            'SECTITELE' => $profissional->secao_titulo_eleitor,
            'DSCMUNTITELE' => '',
            'UFTITELE' => '',
            'TPOREG' => '',
            'EML' => $profissional->email,
            'HPG' => '',
            'TPOENDCOR' => 1,
            'DTAREGCRE' => date('Y-m-d'),
            'NROREGCRE' => ($idRegistro+1),
            'NROCRTCRE' => $carteira,
            'TPONROIMPCRT' => '',
            'DTAINIREG' => $profissional->data_registro_origem,
            'DTAFIMREG' => $profissional->data_cancelamento,
            'PRFCAD_CODRNPAST' => '',
            'CPFAST' => '',
            'NMEAST' => '',
            'DTAINIVCLAST' => '',
            'DTAFIMVCLAST' => '');

        foreach($contato as $contat){
            $enderecoProfissional['Endereco'] = array(
                'VdeEnd' => $contat,
                'TPOEND' => $contat,
                'TPOLOG' => $contat,
                'DSCLOG' => $contat,
                'COMLOG' => $contat,
                'BAILOG' => $contat,
                'LOCLOG' => $contat,
                'UFLOG' => $contat,
                'CEPLOG' => $contat->cep,
                'DDD' => $contat,
                'TEL' => $contat,
                'DDD2' => $contat,
                'TEL2' => $contat
            );
            $end['Enderecos'][] = $enderecoProfissional;
        }

        foreach($titulos as $titulo){
            $tituloProfissional['Titulo'] = array(
                'VdeEnd' => $titulo,
                'DSCLOG' => $titulo,
                'COMLOG' => $titulo,
                'TPOEND' => $titulo,
                'TPOLOG' => $titulo,
                'BAILOG' => $titulo,
                'LOCLOG' => $titulo,
                'UFLOG' => $titulo,
                'CEPLOG' => $titulo->cep,
                'DDD' => $titulo,
                'TEL' => $titulo,
                'DDD2' => $titulo,
                'TEL2' => $titulo,
            );
            $tit['Titulos'][] = $tituloProfissional;
        }

        foreach($titulos as $titulo){
            $anuidadeProfissional['Anuidade'] = array(
                'DTAALT' => $titulo,
                'ANOPAG' => $titulo,
                'TPOSIT' => $titulo
            );
            $anu['Anuidades'][] = $anuidadeProfissional;
        }

        $envio['CadastrarProfissional xmlns="http://wcf.confea.org.br/WsCreaCadastroProfissional"']['_FichaCadastro'] = array($dadoProfissional, $end, $tit, $anu, '_senha' => $senha, '_crea' => $crea);

    }

    public function getNomeProfissional(Request $request){
        $pessoafisica = new PessoaFisica();
        $profissional = $pessoafisica->getDadoProfissional($request->all());

    }

}
