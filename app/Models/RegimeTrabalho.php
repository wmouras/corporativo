<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimeTrabalho extends Model
{
    use HasFactory;

    const CREATED_AT = 'data_cadastro';
    const UPDATED_AT = 'data_alteracao';
    protected $table = 'tb_pessoa_fisica';
    protected $primaryKey = 'fk_id_pessoa';

    protected $fillable = ['id_regime_trabalho', 'regime_trabalho'];
}
