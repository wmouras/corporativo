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
        $tel = model::select()->where('fk_id_pessoa', $idPessoa)->get();

        for($i=0; $i<2; $i++){

            if(isset($tel[$i])){
                $telefone[$i]['id_telefone'] = $tel[$i]['id_telefone'];
                $telefone[$i]['telefone'] = formatarNrTelefone($tel[$i]['telefone']);
            }else{
                $telefone[$i]['id_telefone'] = '';
                $telefone[$i]['telefone'] = '';
            }
        }
        // dd($telefone);

        return $telefone;
    }

    public function salvarTelefone($request, $idPessoa, $idUser)
    {

        // dd($request);
        for($i=0; $i<2; $i++){
            $telefone['id_telefone'] = $request['telefone']['id_telefone'.$i];
            $telefone['fk_id_pessoa'] = $idPessoa;
            $telefone['fk_id_tipo_telefone'] = $i+1;
            $telefone['telefone'] = apenasNumero($request['telefone']['telefone'.$i]);
            $telefone['usuario_alteracao'] = $idUser;

            $rs = model::updateOrCreate(['id_telefone' => $telefone['id_telefone'.$i]], $telefone);
        }
        return $rs;
    }
}
