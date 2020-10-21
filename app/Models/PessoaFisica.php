<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    use HasFactory;

    const CREATED_AT = 'data_cadastro';
    const UPDATED_AT = 'data_alteracao';

    protected $fillable = ['fk_id_pessoa', 'nome', 'cpf', 'identidade', 'data_emissao_identidade', 'data_nascimento', 'foto', 'pai', 'mae', 'sexo', 'tipo_sangue',
'fk_cd_nacionalidade', 'fk_id_naturalidade', 'deficiente', 'senha', 'titulo_eleitor', 'zona_titulo_eleitor', 'secao_titulo_eleitor', 'fk_cidade_titulo_eleitor', 'observacao'];

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_pessoa_fisica';

}
