<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidade extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_nacionalidade';

    public function listaNacionalidade(){
        return model::select('nacionalidade', 'cd_nacionalidade')->orderBy('nacionalidade')->get();
    }

    public function getNacionalidade($cdNacionalidade){
        return model::select('nacionalidade', 'cd_nacionalidade')->where('cd_nacionalidade', $cdNacionalidade)->get();
    }

}
