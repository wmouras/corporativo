<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimeTrabalho extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tb_regime_trabalho';
    protected $primaryKey = 'id_regime_trabalho';

    protected $fillable = ['id_regime_trabalho', 'regime_trabalho'];

    public function getListaRegimeTrabalho(){
        return model::select('id_regime_trabalho', 'regime_trabalho')->orderBy('regime_trabalho')->get();
    }
}
