<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    use HasFactory;

    const CREATED_AT = 'data_cadastro';
    const UPDATED_AT = 'data_alteracao';
    protected $table = 'tb_pessoa_fisica';

    protected $primaryKey = 'fk_id_pessoa';

    protected $fillable = ['fk_id_pessoa', 'nome', 'cpf', 'identidade', 'data_emissao_identidade', 'data_nascimento', 'sexo', 'tipo_sangue',
'fk_cd_nacionalidade', 'fk_id_naturalidade', 'deficiente', 'titulo_eleitor', 'zona_titulo_eleitor', 'secao_titulo_eleitor', 'observacao'];

    public function getPessoaFisica($idPessoa){
        $select = model::select()
            ->leftJoin('tb_pessoa', 'tb_pessoa_fisica.fk_id_pessoa', '=', 'tb_pessoa.id_pessoa')
            ->leftJoin('users', 'users.id', '=', 'tb_pessoa.fk_id_user')
            ->leftJoin('tb_registro_profissional', 'tb_registro_profissional.fk_id_pessoa', '=', 'tb_pessoa_fisica.fk_id_pessoa')
            ->where('tb_pessoa_fisica.fk_id_pessoa', $idPessoa);

        return $select->first();
    }

    public  function getDadoProfissional($request)
    {


        $select = model::select()
            ->leftJoin('tb_registro_profissional', 'tb_registro_profissional.fk_id_pessoa', '=', 'tb_pessoa_fisica.fk_id_pessoa')
            ->where('tb_registro_profissional.numero_carteira', $request['nu_registro']);
        return $select->first();
    }

}
