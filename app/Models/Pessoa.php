<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = 'tb_pessoa';
    protected $primaryKey = 'tb_pessoa';
    public $timestamps = false;
    protected $fillable = ['id_pessoa', 'tipo_pessoa', 'fk_id_user'];

    public function salvarPessoa($pessoa)
    {

        $usuario = DB::select('select * from tb_pessoa where fk_id_user = ?', [$pessoa['fk_id_user']]);
        if (!$usuario) {
            return DB::table('tb_pessoa')->insertGetId($pessoa);
        } else {
            return $usuario[0]->id_pessoa;
        }

    }

}
