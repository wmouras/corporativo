<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_endereco';
    protected $primaryKey = 'id_endereco';
    public $timestamps = false;

    protected $fillable = ['id_endereco','fk_id_pessoa', 'fk_id_tipo_endereco', 'endereco', 'complemento', 'numero', 'bairro', 'fk_id_cidade', 'cep', 'endereco_valido', 'envia_correspondencia', 'endereco_recital', 'data_atualizacao', 'usuario_atualizacao', 'situacao_envio_confea'];

    public function getEnderecoPessoa($idPessoa, $idTipoEndereco){
        return model::select()
            ->where('fk_id_pessoa', $idPessoa)->where('fk_id_tipo_endereco', $idTipoEndereco)->first();
    }

}
