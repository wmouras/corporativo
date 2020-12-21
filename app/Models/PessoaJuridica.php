<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    use HasFactory;

    const CREATED_AT = 'data_cadastro';
    const UPDATED_AT = 'data_alteracao';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_pessoa_juridica';
    protected $fillable = ['fk_id_pessoa', 'codigo_registro', 'razao_social', 'nome_fantasia', 'cnpj', 'fk_id_tipo_empresa', 'fk_id_tipo_estabelecimento', 'capital_social', 'dt_ultima_alt_capital', 'nr_ultima_alt_contratual', 'dt_ultima_alt_contratual', 'objetivo_social', 'observacoes', 'usuario', 'data_cadastro', 'data_alteracao'];

    public function getPessoaJuridica($idPessoa){

        return PessoaJuridica::select()
            ->leftJoin('tb_pessoa', 'tb_pessoa_juridica.fk_id_pessoa', '=', 'tb_pessoa.id_pessoa')
            ->leftJoin('users', 'users.id', '=', 'tb_pessoa.fk_id_user')
            ->leftJoin('tb_registro_empresa', 'tb_registro_empresa.fk_id_pessoa', '=', 'tb_pessoa_juridica.fk_id_pessoa')
            ->where('tb_pessoa.id_pessoa', $idPessoa)->first();

    }
}
