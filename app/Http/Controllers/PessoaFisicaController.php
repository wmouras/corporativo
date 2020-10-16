<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\PessoaFisica;
use App\Models\Nacionalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Crypt;

class PessoaFisicaController extends Controller
{

    public function index(){
        if(Auth::user()->id == 2)
        {
            $pessoa = PessoaFisica::where('fk_id_pessoa', 12)->get()[0];
            $pessoa->fk_id_pessoa = Crypt::encryptString($pessoa->fk_id_pessoa);

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

    public function salvar( Request $request ){

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $alt_capital = date('Y-m-d', strtotime($request->dt_ultima_alt_capital));
        $alt_contratual = date('Y-m-d', strtotime($request->dt_ultima_alt_contratual));
        $cnpj = preg_replace( "/[^0-9]/", "", $request->cnpj );
        $capital_social = preg_replace( "/[^0-9,]/", "", $request->capital_social );
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['fk_id_pessoa' => $idPessoa]);
        $request->merge(['cnpj' => $cnpj]);
        $request->merge(['capital_social' => str_replace(',', '.', $capital_social)]);
        $request->merge(['dt_ultima_alt_capital' => $alt_capital]);
        $request->merge(['dt_ultima_alt_contratual' => $alt_contratual]);

        $result = PessoaFisica::updateOrCreate( $request->all(), ['fk_id_pessoa' => $idPessoa] );
        dd($result);
    }

    public function dados($id){
        $id = Crypt::decryptString($id);
        $nacionalidade = new Nacionalidade();
        $endereco = new Endereco();

        $pf = PessoaFisica::where('fk_id_pessoa', $id)->get()[0];
        $pf['enderecos'] = $endereco->getEnderecoPessoa( $id );

        // dd( $pf );

        session(['id_pessoa' => Crypt::encryptString($id)]);

        return view('pf/pessoafisica', ['pessoafisica' => $pf]);

    }
}
