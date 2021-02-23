<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;
    const CREATED_AT = 'data_cadastro';
    const UPDATED_AT = 'data_alteracao';
    protected $table = 'tb_telefone';
    protected $primaryKey = 'fk_id_telefone';

    protected $fillable = ['id_telefone', 'fk_id_pessoa', 'fk_id_tipo_telefone', 'telefone', 'data_alteracao', 'data_cadastro', 'usuario_alteracao'];

    public  function getTelefonePessoa($idPessoa)
    {
        return model::select()->where('fk_id_pessoa', $idPessoa)->get();
    }
}
