<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crq extends Model
{
    use HasFactory;
    protected $table = 'tb_crq';
    protected $primaryKey = 'fk_id_crq';

    protected $fillable = ['pk_id_crq', 'fk_id_pessoa', 'nome_razao', 'fk_id_pessoa', 'cpf_cnpj', 'pendencia'];

    public function getCrq($idPessoa){

    }

}
