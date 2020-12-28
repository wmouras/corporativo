<?php

function alterarDataBrMysql($data){

    if (isset($data) && $data != '') {
        return \Carbon\Carbon::createFromDate(str_replace('/', '-', $data))->format('Y-m-d');
    }
    return null;
}

function alterarDataMysqlBr($data){
    if (isset($data) && $data != '') {
        return \Carbon\Carbon::createFromDate(str_replace('/', '-', $data))->format('d/m/Y');
    }
    return null;
}

function diretorioImagem($imagem)
{
    return public_path('img/'.$imagem);
}

function formatarCpf($cpf){
    return substr( $cpf, 0, 3 ).'.'.substr( $cpf, 3, 3 ).'.'.substr( $cpf, 6, 3 ).'-'.substr( $cpf, 9, 2 );
}

function formatarCnpj($cnpj){
    return substr( $cnpj, 0, 2 ).'.'.substr( $cnpj, 2, 3 ).'.'.substr( $cnpj, 5, 3 ).'/'.substr( $cnpj, 9, 4 ).'-'.substr( $cnpj, 13, 2 );
}

function formatarCep($cep){
    return substr( $cep, 0, 2 ).'.'.substr( $cep, 2, 3 ).'-'.substr( $cep, 5, 3 );
}

function apenasNumero( $campo )
{
    return preg_replace('/[^0-9]/', '', $campo);
}

function valorMysqlBr( $valor )
{
    return str_replace('.', ',', $valor);
}

function valorBrMysql( $valor )
{
    $vl = preg_replace("/[^0-9,]/", "", $valor );
    return str_replace(',', '.', $vl);
}

function formatarTituloEleitor( $campo )
{
    return substr($campo, 0, 4).' '.substr($campo, 4, 4).' '.substr($campo, 8, 2).' '.substr($campo, 10, 2);
}

function validarTituloEleitor( $titulo ){
    $titulo = substr( preg_replace('/[^0-9]/', '', $titulo), 0, 12);
    return $titulo;

}
