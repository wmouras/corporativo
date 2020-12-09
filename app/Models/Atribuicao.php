<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribuicao extends Model
{
    use HasFactory;

     /**
      * The table associated with the model.
      *
      * @var string
      */
    protected $table = 'tb_atribuicao';
    protected $primaryKey = 'codigo_atribuicao';
    protected $fillable = ['codigo_atribuicao', 'descricao_atribuicao', 'fk_id_pessoa', 'fk_id_registro_profissional'];
    public $timestamps = false;

    public function getAtribuicaoProfissional($idPessoa)
    {
        return model::select('codigo_atribuicao', 'descricao_atribuicao')
            ->join('tb_atribuicao_profissional', 'tb_atribuicao_profissional.fk_codigo_atribuicao', '=', 'tb_atribuicao.codigo_atribuicao')
            ->join('tb_registro_profissional', 'tb_registro_profissional.id_registro_profissional', '=', 'tb_atribuicao_profissional.fk_id_registro_profissional')
            ->where('fk_id_pessoa', $idPessoa)
            ->orderBy('descricao_atribuicao')->get();
    }

    public function getListaAtribuicao()
    {
        return model::select('codigo_atribuicao', 'descricao_atribuicao')->orderBy('descricao_atribuicao')->get();
    }
}
