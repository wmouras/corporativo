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

    public function getEnderecoPessoa($idPessoa){
        return model::select('*')->where('fk_id_pessoa', $idPessoa)->get();
    }
}
