<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroEmpresa extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'tb_registro_empresa';
    protected $primaryKey = 'id_registro_empresa';
    public $timestamps = false;

    protected $fillable = ['id_registro_empresa',' fk_id_pessoa',' codigo_registro',' fk_id_tipo_registro',' fk_id_finalidade_visto',' fk_id_classe',' data_registro',' fk_id_situacao_registro',' data_validade_registro',' observacoes',' divulga_dados',' fk_id_modo_envio_anuidade',' data_cancelamento',' data_cadastro',' usuario']


}
