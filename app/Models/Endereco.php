<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

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

    public function getEnderecoCep( $cep ){

        $cep = preg_replace('/[^0-9-]/', '', $cep);

        $resposta = Http::get('http://ws.creadf.org.br/api/endereco/'.$cep)->json();

        if ($resposta)
        {
            return [
                'logradouro' => $resposta['descricao_tplog']." ".$resposta['nome_logradouro'],
                'cidade' => $resposta['nome_cidade'],
                'fk_id_bairro' => $resposta['fk_bairro'],
                'fk_id_cidade' => $resposta['fk_cidade'],
                'fk_id_tipologradouro' => $resposta['fk_tipologradouro'],
                'fk_id_logradouro' => $resposta['fk_logradouro'],
                'estado' => $resposta['descricao_uf'],
                'bairro' => $resposta['nome_bairro']
            ];
        }else
            return false;

}

}
