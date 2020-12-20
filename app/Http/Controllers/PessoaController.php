<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PessoaController extends Controller
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
            $pessoa = Pessoa::where('fk_id_pessoa', Auth::user()->id)->get()[0];
            $pessoa['idPessoa'] = Crypt::encryptString($pessoa->fk_id_pessoa);

            // dd( $pessoa );
            // $pessoa->listaUf = $endereco->;
            session(['admin' => false]);
            if( $pessoa->fk_id_tipo_pessoa == 1 )
            {
                return view('pf/index', ['pessoa' => $pessoa, 'admin' => false, 'editar' => 'disabled']);
            }else{
                return view('pj/index', ['pessoa' => $pessoa, 'admin' => false, 'editar' => 'disabled']);
            }
        }

    }

    public function lista(Request $request = null){

        // dd( PessoaFisica::all() );
        $lista = Pessoa::select('tb_pessoa.id_pessoa', 'tb_pessoa.tipo_pessoa', 'tb_pessoa_fisica.nome', 'tb_pessoa_fisica.cpf', 'users.email as email',
                                'tb_pessoa_juridica.razao_social', 'tb_pessoa_juridica.fk_id_pessoa', 'tb_pessoa_juridica.cnpj', 'tb_email.email as email_pessoa',
                                'tb_registro_empresa.codigo_registro', 'tb_registro_profissional.numero_carteira')
            ->leftjoin('tb_pessoa_fisica', 'tb_pessoa.id_pessoa', '=', 'tb_pessoa_fisica.fk_id_pessoa')
            ->leftjoin('tb_registro_profissional', 'tb_pessoa.id_pessoa', '=', 'tb_registro_profissional.fk_id_pessoa')
            ->leftjoin('tb_pessoa_juridica', 'tb_pessoa.id_pessoa', '=', 'tb_pessoa_juridica.fk_id_pessoa')
            ->leftjoin('tb_registro_empresa', 'tb_pessoa.id_pessoa', '=', 'tb_registro_empresa.fk_id_pessoa')
            ->leftjoin('tb_email', 'tb_pessoa.id_pessoa', '=', 'tb_email.fk_id_pessoa')
            ->leftjoin('users', 'users.id', '=', 'tb_pessoa.id_pessoa')
            ->where('tb_pessoa.tipo_pessoa', '=', '1')
            ->take(35)->orderByDesc('tb_pessoa.id_pessoa')->get();

        foreach($lista as $p)
        {
            $pessoa['idPessoa'] = Crypt::encryptString($p->id_pessoa);
            $pessoa['nome'] = $p->nome.$p->razao_social;
            $pessoa['registro'] = $p->numero_carteira.$p->codigo_registro;
            $pessoa['idReceita'] = $p->cpf.$p->cnpj;
            $pessoa['email'] = $p->email.$p->email_pessoa;
            $pessoa['tipoPessoa'] = $p->tipo_pessoa;
            $pessoas[] = (object) $pessoa;
        }

        // dd( $pessoas );+

        return view('pessoa/listapessoa', ['pessoas' => $pessoas, 'admin' => true, 'editar' => '']);

    }
}
