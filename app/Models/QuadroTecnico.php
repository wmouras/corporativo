<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuadroTecnico extends Model
{
    use HasFactory;

    protected $table = 'tb_quadro_tecnico';
    protected $primaryKey = 'id_quadro_tecnico';
    public $timestamps = false;

    protected $fillable = ['id_quadro_tecnico','fk_id_registro_profissional','fk_id_registro_empresa','fk_id_tipo_vinculo',' fk_id_regime_trabalho',' data_inicio',' data_validade',' data_baixa',' horario_trabalho',' data_ultima_alteracao',' data_cadastro',' usuario'];

    public function getListaEmpresaQuadro( $idPessoa ){

        return model::select(['id_quadro_tecnico', 'fk_id_registro_profissional', 'fk_id_registro_empresa', 'fk_id_tipo_vinculo',
                             'fk_id_regime_trabalho', 'data_inicio', 'data_validade', 'data_baixa', 'tb_pessoa_juridica.razao_social'])
            ->join('tb_registro_empresa', 'tb_quadro_tecnico.fk_id_registro_empresa', '=', 'tb_registro_empresa.id_registro_empresa')
            ->join('tb_pessoa_juridica', 'tb_registro_empresa.fk_id_pessoa', '=', 'tb_pessoa_juridica.fk_id_pessoa')
            ->join('tb_registro_profissional', 'tb_quadro_tecnico.fk_id_registro_profissional', '=', 'tb_registro_profissional.id_registro_profissional')
            ->where('tb_registro_profissional.fk_id_pessoa', $idPessoa)->get();
            // ->where('fk_id_tipo_endereco', $idTipoEndereco)->first();

    }

}
