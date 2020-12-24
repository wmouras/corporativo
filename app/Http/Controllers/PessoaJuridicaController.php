<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Parentesco;
use Illuminate\Http\Request;
use App\Models\TipoEmpresa;
use App\Models\PessoaJuridica;
use App\Models\QuadroTecnico;
use App\Models\TipoEstabelecimento;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use App\Models\Email;

/**
 * Classe de tratamento de dados das empresas.
 *
 * @var      PesssoaJuridica
 * @package  Controller
 * @author   Wellington Moura <wellington.m.sousa@gmail.com>
 * @category Sistema_Corporativo_Do_Crea-df
 * @link     http:www.corporativo.creadf.org.br
 * @license  proprietário
 */
class PessoaJuridicaController extends Controller
{

    /**
     * Função inicial da classe
     *
     * @return array vazio
     */
    public function index()
    {
        return Inertia::render('pj/PessoaJuridica');
    }

    /**
     * Função que lista as empresas
     *
     * @return array
     */
    public function lista()
    {

        $pjs = PessoaJuridica::select('fk_id_pessoa', 'nome_fantasia', 'razao_social', 'cnpj', 'codigo_registro')->get();
        foreach($pjs as $pj)
        {
            $pj->fk_id_pessoa = Crypt::encryptString($pj->fk_id_pessoa);
            $p[] = $pj;
        }

        return response()->json($p);

    }

    /**
     * Função que lista ss tipos de empresa
     *
     * @return array
     */
    public function listaTipoEmpresa()
    {
        $tipoEmpresa = new TipoEmpresa();
        return response()->json($tipoEmpresa->listaTipoEmpresa());
    }

    /**
     * Função que lista ss tipos de estabelecimentos
     *
     * @return array
     */
    public function listaTipoEstabelecimento()
    {
        $tipo = new TipoEstabelecimento();
        return response()->json($tipo->listaTipoEstabelecimento());
    }

    /**
     * Função que lista ss tipos de estabelecimentos
     *
     * @param  $request Request
     * @return array()
     */
    public function salvar(Request $request)
    {

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $alt_capital = date('Y-m-d', strtotime($request->dt_ultima_alt_capital));
        $alt_contratual = date('Y-m-d', strtotime($request->dt_ultima_alt_contratual));
        $cnpj = preg_replace("/[^0-9]/", "", $request->cnpj);
        $capital_social = preg_replace("/[^0-9,]/", "", $request->capital_social);
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['fk_id_pessoa' => $idPessoa]);
        $request->merge(['cnpj' => $cnpj]);
        $request->merge(['capital_social' => str_replace(',', '.', $capital_social)]);
        $request->merge(['dt_ultima_alt_capital' => $alt_capital]);
        $request->merge(['dt_ultima_alt_contratual' => $alt_contratual]);

        $result = PessoaJuridica::updateOrCreate( $request->all(), ['fk_id_pessoa' => $idPessoa] );
        dd($result);
    }

    public function salvarPessoaJuridica( Request $request )
    {

        $data_emissao_identidade = alterarDataBrMysql($request->data_emissao_identidade);
        $data_nascimento = alterarDataBrMysql($request->data_nascimento);
        $request['titulo_eleitor'] = validarTituloEleitor($request->titulo_eleitor);
        $request['cpj'] = preg_replace("/[^0-9]/", "", $request->cpj);
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['data_emissao_identidade' => $data_emissao_identidade]);
        $request->merge(['data_nascimento' => $data_nascimento]);

        if(!$request->session()->get('id_pessoa')) {
            $user = new User();
            $pessoa = new Pessoa();
            $idPessoa = null;
            $cpj = $request['cpj'];
            $usuario['name'] = $request['nome'];
            $usuario['email'] = $request['email'];
            $usuario['password'] = Hash::make($user->gerarSenhaAleatoria($cpj));
            $idUsuario = $user->salvarUsuario($usuario);

            $pj['fk_id_user'] = $idUsuario;
            $pj['id_pessoa'] = null;
            $pj['tipo_pessoa'] = 1;
            $idPessoa = $pessoa->salvarPessoa($pj);
            $request->merge(['fk_id_pessoa' => $idPessoa]);
            session(['id_pessoa' => Crypt::encryptString($idPessoa)]);

        } else {
            $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        }

        try{

            $request->merge(['fk_id_pessoa' => $idPessoa]);
            $result = PessoaJuridica::updateOrCreate(['fk_id_pessoa' => $idPessoa], $request->all());

            $parentesco = array( $request->parentesco1, $request->parentesco2);
            $modelParentesco = new Parentesco();
            $modelParentesco->salvarParentesco($parentesco, $idPessoa);

            return response()->json(array('status'=>'success', 'msg'=>'Profissional cadastrado com sucesso.' ));

            // return redirect()->route('pessoajuridica.edit', ['id'=>$request->session()->get('id_pessoa')])->with('suscesso', 'You have no permission for this page!');

        }catch(QueryException $e){

        }

    }

    public function edicao(Request $request)
    {

        session(['id_pessoa' => $request->id]);
        $idPessoa = Crypt::decryptString($request->id);

        $tpEst = new TipoEstabelecimento();
        $tpEmp = new TipoEmpresa();
        $endereco = new Endereco();
        $quadro = new QuadroTecnico();
        $pessoajuridica = new PessoaJuridica();
        $email = new Email();
        $emailPessoa = $email->getEmail($idPessoa);

        $pj = $pessoajuridica->getPessoaJuridica($idPessoa);
        $pj->tipoEmpresa = $tpEmp->getListaTipoEmpresa();
        $pj->tipoEstabelecimento = $tpEst->getListaTipoEstabelecimento();
        $pj->id_pessoa = $request->id;
        $pj->email_empresa = $emailPessoa->email;
        $pj->cnpj = formatarCnpj($pj->cnpj);
        $pj->dt_ultima_alt_capital = alterarDataMysqlBr($pj->dt_ultima_alt_capital);
        $pj->dt_ultima_alt_contratual = alterarDataMysqlBr($pj->dt_ultima_alt_contratual);
        $municipio = Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pj->fk_id_naturalidade)->json();
        $pj->observacao = addslashes($pj->observacao);

        if($municipio ) {
            $cidade = (object) $municipio;
            $pj->fk_id_uf = $cidade->fk_uf;
            $pj['cidades'] = json_encode(Http::get('http://ws.creadf.org.br/api/endereco/cidade/uf/'.$cidade->fk_uf)->json());
            $pj->nome_cidade = $cidade->nome_cidade;
            $pj->fk_id_naturalidade = $cidade->pk_cidade;
        } else {
            $cidade = array();
            $pj['cidades'] = '[]';
            $pj->nome_cidade = '';
            $pj->fk_id_uf = '';
        }

        $pj->endereco = $endereco->getEnderecoPessoa($idPessoa, 1);

        if(!$pj->endereco) {
            $pj->endereco = new Endereco();
        }else{
            $cidade = (object) Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pj->endereco->fk_id_cidade)->json();

            $pj->endereco->cidade = $cidade->nome_cidade;
            $pj->endereco->estado = $cidade->descricao_uf;
            $pj->endereco->cep = formatarCep($pj->endereco->cep);
        }

        $pj->correspondencia = $endereco->getEnderecoPessoa($idPessoa, 2);
        if(!$pj->correspondencia) {
            $pj->correspondencia = new Endereco();
        }
        else
        {
            $cidade = (object) Http::get('http://ws.creadf.org.br/api/endereco/cidade/'.$pj->correspondencia->fk_id_cidade)->json();
            $pj->correspondencia->cidade = $cidade->nome_cidade;
            $pj->correspondencia->estado = $cidade->descricao_uf;
            $pj->correspondencia->cep = formatarCep($pj->correspondencia->cep);
        }

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
        $pj->quadros = $qts;

        if($request->session()->get('admin', 0) ) {
            return view('pj/pessoajuridica', ['pessoajuridica' => $pj, 'admin' => true, 'editar' => '']);
        }else
        {
            return view('pj/pessoajuridica', ['pessoajuridica' => $pj, 'admin' => false, 'editar' => 'disabled']);
        }

    }

    public function novo(Request $rquest)
    {

        session(['id_pessoa' => null]);
        $pj = new PessoaJuridica();
        $pj->endereco = new Endereco();
        $pj->correspondencia = new Endereco();
        $pj->quadros = array();
        return view('pj/pessoajuridica', ['pessoajuridica' => $pj, 'admin' => true, 'editar' => '']);

    }

    public function enviarRegistroProfissional(Request $request){}

}
