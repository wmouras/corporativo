<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEmpresa;
use App\Models\PessoaJuridica;
use App\Models\TipoEstabelecimento;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Crypt;
use Laravel\Jetstream\InertiaManager;

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

    /**
     * Função que retorna um empresa para edição
     *
     * @param  Integer $id id da empresa
     * @return array
     */
    public function edicao(Request $request)
    {
        $tpEst = new TipoEstabelecimento();
        $tpEmp = new TipoEmpresa();
        $id = Crypt::decryptString($request->id);

        $pj = PessoaJuridica::where('fk_id_pessoa', $id)->first();
        $pj['empresa'] = $tpEmp->getTipoEmpresa( $pj['fk_id_tipo_empresa'] );
        $pj['estabelecimento'] = $tpEst->getTipoEstabelecimento( $pj['fk_id_tipo_estabelecimento'] );
        session(['id_pessoa' => Crypt::encryptString($id)]);
        return view('pj/pessoajuridica', ['pessoajuridica' => $pj]);

    }

}
