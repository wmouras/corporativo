<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEmpresa extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tipo_empresa';

    public function listaTipoEmpresa(){
        return model::select('id_tipo_empresa', 'tipo_empresa')->orderBy('tipo_empresa')->get();
    }

    public function getTipoEmpresa($id){
        return model::select('id_tipo_empresa', 'tipo_empresa')->where('id_tipo_empresa', $id)->get();
    }
}
