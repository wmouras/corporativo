<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_parentesco';
    public $timestamps = false;
    protected $primaryKey = 'id_parentesco';
    protected $fillable = ['fk_id_pessoa', 'nome', 'fk_id_tipo_parentesco'];

    public function getParentescoPessoa($idPessoa){
        return model::select()->where('fk_id_pessoa', $idPessoa)->get();
    }

    public function salvarParentesco($parentesco, $idPessoa)
    {
        foreach( $parentesco as $parente ){
            $parente['fk_id_pessoa'] = $idPessoa;
            $result = model::updateOrCreate(['id_parentesco' => $parente['id_parentesco']], $parente);
        }
        return $result;

    }
}
