<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    use HasFactory;

    protected $table = 'tb_titulo_profissional';
    protected $primaryKey = 'id_titulo_profissional';
    public $timestamps = false;

    protected $fillable = ['id_titulo_profissional', 'fk_id_registro_profissional', 'fk_codigo_titulo_confea', 'data_conclusao_curso', 'data_diploma', 'livro', 'principal', 'fk_numero_processo', 'instituicao_ensino', 'data_cadastro', 'usuario_cadastro', 'data_alteracao', 'usuario_alteracao'];

    public function getListaTitulo( $idPessoa )
    {

        return model::select('tb_titulo_confea.descricao_masculina', 'tb_titulo_profissional.data_conclusao_curso','tb_titulo_profissional.instituicao_ensino' )
            ->join('tb_titulo_confea', 'tb_titulo_confea.codigo_titulo_confea', '=', 'tb_titulo_profissional.fk_codigo_titulo_confea')
            ->join('tb_registro_profissional', 'tb_registro_profissional.id_registro_profissional', '=', 'tb_titulo_profissional.fk_id_registro_profissional')
            ->where('tb_registro_profissional.fk_id_pessoa', $idPessoa)->get();

    }
}
