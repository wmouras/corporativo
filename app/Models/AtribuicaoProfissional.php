<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtribuicaoProfissional extends Model
{
    use HasFactory;

     /**
      * The table associated with the model.
      *
      * @var string
      */
    protected $table = 'tb_atribuicao_profissional';
    protected $primaryKey = 'fk_id_registro_profissional';
    protected $fillable = ['fk_id_registro_profissional', 'fk_codigo_atribuicao'];
    public $timestamps = false;


}
