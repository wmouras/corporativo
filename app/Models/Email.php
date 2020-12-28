<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
   use HasFactory;

     /**
      * The table associated with the model.
      *
      * @var string
      */
    protected $table = 'tb_email';
    protected $fillable = ['fk_id_pessoa', 'fk_id_tipo_email', 'email', 'principal', 'usuario_alteracao', 'data_alteracao'];
    public $timestamps = false;

    public function getEmail($idPessoa)
    {
        return model::select()
            ->where('fk_id_pessoa', $idPessoa)->first();
    }

    public function getListaEmail($idPessoa)
    {
        return model::select()->orderBy('descricao_atribuicao')->where('fk_id_pessoa', $idPessoa)->get();
    }
}
