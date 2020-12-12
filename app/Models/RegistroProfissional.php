<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroProfissional extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'tb_registro_profissional';
    protected $primaryKey = 'id_registro_profissional';
    public $timestamps = false;

    protected $fillable = ['id_registro_profissional',' fk_id_pessoa',' rnp',' numero_carteira',' uf_registro',' data_registro_origem',' data_validade_registro',' numero_visto',' data_visto',' data_validade_visto',' fk_id_situacao_registro',' observacoes',' divulga_dados',' fk_id_modo_envio_anuidade',' data_cancelamento',' data_alteracao',' fk_id_entidade_classe'];

    public function getRegistroProfissional($idPessoa)
    {
        return Model::select()->where('fk_id_pessoa', '=', $idPessoa)->first();
    }
}
