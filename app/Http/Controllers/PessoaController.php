<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Database\QueryException;
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
            session(['editar' => '']);
            return $this->lista(new Request);
        }
        else
        {
            try {
                $pessoa = Pessoa::where('fk_id_user', Auth::user()->id)->get()[0];
                $pessoa->id_pessoa = Crypt::encryptString($pessoa->id_pessoa);

            }catch(QueryException $e){
                return view('nr/index', ['pessoa' => new User(), 'admin' => false, 'editar' => 'disabled']);
            }

            session(['admin' => false]);
            session(['editar' => 'disabled']);
            if( $pessoa->tipo_pessoa == 1 )
            {
                return redirect()->route('pessoafisica.index', ['pessoa' => $pessoa]);
            }else{
                return redirect()->route('pf/pessoajuridica/index', ['pessoa' => $pessoa, 'admin' => false, 'editar' => 'disabled']);
            }
        }

    }

    public function lista(Request $request){

        $lista = Pessoa::select('tb_pessoa.id_pessoa', 'tb_pessoa.tipo_pessoa', 'tb_pessoa_fisica.nome', 'tb_pessoa_fisica.cpf', 'users.email',
                                'tb_pessoa_juridica.razao_social', 'tb_pessoa_juridica.fk_id_pessoa', 'tb_pessoa_juridica.cnpj', 'tb_email.email as email_pessoa',
                                'tb_registro_empresa.codigo_registro', 'tb_registro_profissional.numero_carteira')
            ->leftjoin('tb_pessoa_fisica', 'tb_pessoa.id_pessoa', '=', 'tb_pessoa_fisica.fk_id_pessoa')
            ->leftjoin('tb_registro_profissional', 'tb_pessoa.id_pessoa', '=', 'tb_registro_profissional.fk_id_pessoa')
            ->leftjoin('tb_pessoa_juridica', 'tb_pessoa.id_pessoa', '=', 'tb_pessoa_juridica.fk_id_pessoa')
            ->leftjoin('tb_registro_empresa', 'tb_pessoa.id_pessoa', '=', 'tb_registro_empresa.fk_id_pessoa')
            ->leftjoin('tb_email', 'tb_pessoa.id_pessoa', '=', 'tb_email.fk_id_pessoa')
            ->leftjoin('users', 'users.id', '=', 'tb_pessoa.id_pessoa')
            ->whereIn('tb_pessoa.tipo_pessoa', [1,2]);

            if ($request->registro) {
                $lista->where("tb_registro_profissional.numero_carteira", "=", $request->registro)
                    ->orWhere("tb_registro_empresa.codigo_registro", "=", $request->registro);
            }
            if ($request->nome) {
                $lista->where('tb_pessoa_juridica.razao_social', 'like', '%'.$request->nome.'%')
                        ->orWhere('tb_pessoa_fisica.nome', 'like', '%'.$request->nome.'%');
            }
            if ($request->idReceita) {
                $lista->where('tb_pessoa_fisica.cpf', 'like', '%'.$request->idReceita.'%')
                      ->orWhere('tb_pessoa_juridica.cnpj', 'like', '%'.$request->idReceita.'%');
            }

            $lista->take(35)->orderBy('tb_pessoa.id_pessoa', 'desc');

            // dd( $lista->toSql() );

            $lista = $lista->get();

        $pessoas = array();

        foreach($lista as $p)
        {
            if($p->tipo_pessoa == 1)
                $pessoa['idReceita'] = formatarCpf($p->cpf);
            else
                $pessoa['idReceita'] = formatarCnpj($p->cnpj);

            $pessoa['idPessoa'] = Crypt::encryptString($p->id_pessoa);
            $pessoa['nome'] = $p->nome.$p->razao_social;
            $pessoa['registro'] = $p->numero_carteira.$p->codigo_registro;
            $pessoa['email'] = substr($p->email.$p->email_pessoa, 0, 36);
            $pessoa['tipoPessoa'] = $p->tipo_pessoa;
            $pessoas[] = (object) $pessoa;
        }

        return view('pessoa/listapessoa', ['pessoas' => $pessoas, 'admin' => true, 'editar' => '', 'filtro' => $request]);
    }
}
