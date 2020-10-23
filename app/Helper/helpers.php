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

function apenasNumero( $campo )
{
    return preg_replace('/[^0-9]/', '', $campo);
}
