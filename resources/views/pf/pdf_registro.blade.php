{{-- <x-app-layout> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CREA-DF') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>

        h1 {
        color:#c00;
        font-family:sans-serif;
        font-size:2em;
        margin-bottom:0;
        }

        table {
        font-family:sans-serif;
        background-color:#000;
        th, td {
            padding:.25em .5em;
            text-align:left;
            &:nth-child(2) {
            text-align:right;
            }
        }
        td {
            background-color:#fff;
        }
        th {
            background-color:#009;
            color:#fff;
        }
        }

        .zigzag {
        border-collapse:separate;
        border-spacing:.25em 1em;
        thead tr,

        }

        </style>
    </head>
    <body class="font-sans antialiased">

    {{-- <x-slot name="header"> --}}
        <h2 class='' id="paper">
            Registro de Profissional: ({{ $pessoafisica->nome ?? ''}})
        </h2>
    {{-- </x-slot> --}}
    <br>

    <div>

                <div class='overflow-hidden'>

                    <div class=''>

                        <div>
                            CPF: {{$pessoafisica->cpf}}
                        </div>
                        <div>
                            E-mail: {{$pessoafisica->email ?? ''}}
                        </div>
                        <div>
                            Nome: {{$pessoafisica->nome}}
                        </div>
                        <div>
                            Identidade(RG): {{$pessoafisica->identidade}}
                        </div>
                        <div>
                            Data de emissão: {{$pessoafisica->data_emissao_identidade}}
                        </div>
                        <div>
                            Data nascimento: {{$pessoafisica->data_nascimento}}
                        </div>
                        <div>
                            Nacionalidade: {{$pessoafisica->fk_cd_nacionalidade}}
                        </div>
                        <div>
                            Deficiência: {{$pessoafisica->deficiente}}
                        </div>
                        <div>
                            Estado Civil: {{$pessoafisica->estadocivil}}
                        </div>

                        <div>
                            @foreach ($pessoafisica->listaUf as $uf)

                                @if ($uf->pk_uf == $pessoafisica->fk_id_uf)
                                    Naturalidade: {{$pessoafisica->nome_cidade}} - {{$uf->descricao_uf}}
                                @endif
                            @endforeach
                        </div>

                        <div>
                            @if($pessoafisica->parentesco1->fk_id_tipo_parentesco == '1') Mãe @else Pai @endif: {{$pessoafisica->parentesco1->nome}}
                            <BR>
                            @if($pessoafisica->parentesco2->fk_id_tipo_parentesco == '1') Mãe @else Pai @endif: {{$pessoafisica->parentesco2->nome}}
                        </div>

                        <div>
                            Sexo: @if($pessoafisica->sexo == '1') Masculino @else Feminino @endif
                        </div>

                        <div>
                            Tipo sanguíneo: {{$pessoafisica->tipo_sangue}}
                        </div>

                        <div>
                            Nº PIS/PASEP: {{$pessoafisica->nr_pis_pasep}}
                        </div>

                        <div>
                            <table id="descricao">
                                <tr>
                                    <td width="225px">Título eleitor</td><td>Zona eleitoral</td><td>Seção eleitoral</td>
                                </tr>

                                <tr>
                                    <td width="225px">{{$pessoafisica->titulo_eleitor}}</td><td>{{$pessoafisica->zona_titulo_eleitor}}</td><td>{{$pessoafisica->secao_titulo_eleitor}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Observação: </td>
                                </tr>
                                <tr>
                                    <td colspan="3">{{$pessoafisica->observacao}} </td>
                                </tr>

                            </table>

                        <h2>Contato</h2>

                        <table id="contato">
                            <tr>
                                <td width="150px">Telefone 1</td><td>Telefone 2</td>
                            </tr>
                            <tr>
                                @for ($i = 0; $i < 2; $i++)
                                    <td width="150px">{{$pessoafisica->telefone[$i]['telefone']}} </td>
                                @endfor
                            </tr>

                        </table>

                    </div>
                    <br><br>

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/5 h-12 mb-4 mr-5">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cep'>
                                        CEP
                                    </label>
                                    <input x-on:click.prevent="" x-model="frmEndereco.empresa.cep" id='cep' name='cep' type='text' placeholder='Insira o cep'
                                        class='inline px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                    <button id="busca" x-on:click="getEnderecoCep()" class="px-1 py-1 font-bold text-white bg-blue-400 rounded-full hover:bg-blue-700 h-9 w-9">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                                    <div class="w-1/3 h-12 mb-4">
                                        <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='logradouro'>
                                        Logradouro
                                    </label>
                                    <input x-model="frmEndereco.empresa.logradouro" id='logradouro' name='logradouro' type='text' placeholder='Insira o logradouro'
                                        class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 h-12 mb-4 ml-5">
                                    <label class='block w-20 mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='numero'>
                                        Nº
                                    </label>
                                    <input x-model="frmEndereco.empresa.numero" id='numero' name='numero' type='text' placeholder='Insira o número'
                                        class='block w-16 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>

                            </div>
                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/6 h-12 mb-4">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='estado'>
                                    Estado
                                </label>
                                <input x-model="frmEndereco.empresa.estado" id='estado' name='estado' type='text' placeholder='Insira a UF'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 h-12 mb-4">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cidade'>
                                        Cidade
                                    </label>
                                    <input x-model="frmEndereco.empresa.cidade" id='cidade' name='cidade' type='text' placeholder='Escolha a cidade'
                                        class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/4 h-12 mb-4">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='bairro'>
                                        Bairro
                                    </label>
                                    <input x-model="frmEndereco.empresa.bairro" id='bairro' name='bairro' type='text' placeholder='Insira o bairro'
                                        class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>

                            </div>

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/4 h-12 mb-4">
                                   <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='complemento'>
                                    Complemento
                                </label>
                                <input  x-model="frmEndereco.empresa.complemento" id='complemento' name='complemento' type='text' placeholder='Insira o complemento'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                            <div class="flex mb-10 w-65 mt-7" @click="marcarBox()">
                                <label class="switch w-65">
                                    <input type="checkbox" x-model="frmEndereco.st_correspondencia" :value="st_correspondencia" id="st_correspondencia" name="st_correspondencia" checked />
                                    <span class="slider round w-65"></span>

                                </label>
                                <div class="flex-auto mt-1 w-65">
                                    <span class="ml-3 w-65">Endereço de Correspondência</span>
                                </div>
                            </div>

                            <input x-model='frmEndereco.empresa.id_endereco' id='id_endereco' name='id_endereco' type='hidden' />

                            <input x-model='frmEndereco.empresa.fk_id_bairro' id='fk_id_bairro' name='fk_id_bairro' type='hidden' />
                            <input x-model='frmEndereco.empresa.fk_id_cidade' id='fk_id_cidade' name='fk_id_cidade' type='hidden' />
                            <input x-model='frmEndereco.empresa.fk_id_logradouro' id='fk_id_logradouro' name='fk_id_logradouro' type='hidden' />
                            <input x-model='frmEndereco.empresa.fk_id_tipologradouro' id='fk_id_tipologradouro' name='fk_id_tipologradouro' type='hidden' />
                            <input x-model="frmEndereco.empresa.id_endereco" id='id_endereco' name='id_endereco' type='hidden'/>
                        </div>


                        <div class='ml-3 transition-all row col-md-6' style="display: none;" id="dvCorrespondencia" name="dvCorrespondencia">

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/5 h-12 mb-4 mr-5">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cepCorrespondencia'>
                                        CEP
                                    </label>
                                    <input x-on:key.prevent="" x-model="frmEndereco.correspondencia.cep" id='cepCorrespondencia' name='cepCorrespondencia' type='text' placeholder='Insira o cep'
                                        class='inline px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                    <button id="get-endereco" x-on:click.prevent="getEnderecoCepCorrespondecia()" class="px-1 py-1 font-bold text-white bg-blue-400 rounded-full hover:bg-blue-700 h-9 w-9">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                                    <div class="w-1/3 h-12 mb-4">
                                        <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='logradouroCorrespondencia'>
                                        Logradouro
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.logradouro" id='logradouroCorrespondencia' name='logradouroCorrespondencia' type='text' placeholder='Insira o logradouro'
                                        class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 h-12 mb-4 ml-5">
                                    <label class='block w-20 mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='numero'>
                                        Nº
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.numero" id='numeroCorrespondencia' name='numeroCorrespondencia' type='text' placeholder='Insira o número'
                                        class='block w-16 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>

                            </div>
                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/6 h-12 mb-4">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='estado'>
                                    Estado
                                </label>
                                <input x-model="frmEndereco.correspondencia.estado" id='estadoCorrespondencia' name='estadoCorrespondencia' type='text' placeholder='Insira a UF'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 h-12 mb-4">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cidade'>
                                        Cidade
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.cidade" id='cidadeCorrespondencia' name='cidadeCorrespondencia' type='text' placeholder='Escolha a cidade'
                                        class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>
                                <div class="w-1/4 h-12 mb-4">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='bairro'>
                                        Bairro
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.bairro" id='bairroCorrespondencia' name='bairroCorrespondencia' type='text' placeholder='Insira o bairro'
                                        class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/4 h-12 mb-4">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='complemento'>
                                    Complemento
                                </label>
                                <input x-model="frmEndereco.correspondencia.complemento" id='complementoCorrespondencia' name='complementoCorrespondencia' type='text' placeholder='Insira o complemento'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                <div class='overflow-hidden bg-white shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>
                            <div class='flex w-full md:w-1/2 md:mb-0'>
                                <div class='flex-auto px-3 mb-6 md:w-1/2 md:mb-0'>
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='rnp'>
                                        RNP
                                    </label>
                                    <div id='rnp' class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-half-width bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                        {{$pessoafisica->rnp}}
                                    </div>

                                </div>

                                <div class='flex-auto px-3 mb-6 md:w-1/2 md:mb-0'>
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='registro'>
                                        Registro
                                    </label>
                                    <div id='registro' class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-half-width bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                        {{$pessoafisica->numero_carteira}}
                                    </div>
                                </div>
                            </div>

                            <div class="max-w-full mt-5 overflow-hidden rounded">

                                <div class="px-10 py-4">
                                        <div class="mb-2 text-xl font-bold"> Quadro Técnico&nbsp;</div>
                                </div>

                                @if( count($pessoafisica->quadros) > 0)

                                <div class="flex mb-2">
                                    <div class="w-1/4 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Empresa</span></div>
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Início</span></div>
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Validade</span></div>
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Baixa</span></div>
                                    @if(isset($admin) && $admin === true)
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Ação</span></div>
                                    @endif
                                </div>

                                @foreach($pessoafisica->quadros as $quadro)

                                    <div class="flex mb-1">
                                        <div class="w-1/4 h-12 py-3 text-center bg-gray-50">{{$quadro->razao_social ??  ''}}</div>
                                        <div class="w-1/6 h-12 py-3 text-center bg-gray-50">{{$quadro->data_inicio ??  ''}}</div>
                                        <div class="w-1/6 h-12 py-3 text-center bg-gray-50">{{$quadro->data_validade ??  ''}}</div>
                                        <div class="w-1/6 h-12 py-3 text-center bg-gray-50">{{$quadro->data_baixa ??  ''}}</div>
                                        @if(isset($admin) && $admin === true)
                                        <div class="w-1/6 h-12 py-3 text-center bg-gray-50">

                                            <button class="font-bold text-red-700 bg-transparent border border-red-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <button class="ml-4 font-bold text-yellow-500 bg-transparent border border-yellow-300 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>

                                        </div>
                                        @endif
                                    </div>

                                @endforeach

                                @else
                                    <div class="max-w-full mt-5 overflow-hidden rounded shadow-lg">
                                        <div class="px-10 py-4 bg-gray-50">
                                            <div class="mb-2 text-xl font-bold text-alert-info"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Não há registro</div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <div class="max-w-full mt-5 overflow-hidden rounded shadow-lg">

                                <div class="px-10 py-4">
                                    <div class="mb-2 text-xl font-bold"  x-data="registro()">Títulos&nbsp;
                                        @if(isset($admin) && $admin === true)
                                            <button id="get-endereco" x-on:click.prevent="showModalTitulo = true" title="Adicionar ao quadro técnico" class="px-1 py-1 font-bold text-white bg-blue-400 rounded-full hover:bg-blue-700 h-9 w-9">
                                                    <i class="fa fa-plus"></i>

                                            </button>
                                            @include('modal.titulo', [])
                                        @endif

                                    </div>

                                </div>

                                @if(count($pessoafisica->titulos) > 0)

                                <div class="flex mb-1">
                                    <div class="w-1/4 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Título</span></div>
                                    <div class="w-full h-12 py-2 text-center bg-gray-200"><span class="font-bold">Instituição</span></div>
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Data conclusão</span></div>
                                    @if(isset($admin) && $admin === true)
                                    <div class="h-12 py-2 pr-2 text-center bg-gray-200 w-1/8"><span class="font-bold">Ação</span></div>
                                    @endif
                                </div>

                                @foreach($pessoafisica->titulos as $titulo)

                                    <div class="flex mb-1">
                                        <div class="w-1/4 h-12 py-2 text-center bg-gray-50">{{$titulo->descricao_masculina ??  ''}}</div>
                                        <div class="w-full h-12 py-2 text-center bg-gray-50">{{$titulo->instituicao_ensino ??  ''}}</div>
                                        <div class="w-1/6 h-12 py-2 text-center bg-gray-50">{{alterarDataMysqlBr($titulo->data_conclusao_curso) ??  ''}}</div>

                                        @if(isset($admin) && $admin === true)

                                        <div class="h-12 py-2 pl-5 pr-2 w-1/8 bg-gray-50 center">
                                            <button x-data="registro()" x-on:click.prevent="deletarTitulo({{$titulo->id_titulo_profissional}})" class="font-bold text-red-700 bg-transparent border border-red-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                            <input type='hidden' x-data="registro()"  x-model="titulo.id_titulo_profissional" id="id_titulo_profissional" name="id_registro_profissional" value="{{$titulo->id_titulo_profissional}}" />

                                        @endif
                                    </div>
                                @endforeach

                                @else
                                    <div class="max-w-full mt-5 overflow-hidden rounded shadow-lg">
                                        <div class="px-10 py-4 bg-gray-50">
                                            <div class="mb-2 text-xl font-bold text-alert-info"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Não há registro</div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        <div class="max-w-full mt-5 overflow-hidden rounded shadow-lg">

                            <div class="px-10 py-4">
                                <div class="mb-2 text-xl font-bold"  x-data="atribuicao()"> Atribuições&nbsp;

                                 @if(isset($admin) && $admin === true)
                                    <button id="get-atribuicao" x-on:click.prevent="showModalAtribuicao = true" title="Adicionar atribuição do profissional" class="px-1 py-1 font-bold text-white bg-blue-400 rounded-full hover:bg-blue-700 h-9 w-9">
                                            <i class="fa fa-plus"></i>
                                    </button>
                                    @include('modal.atribuicao', [])
                                @endif
                                </div>
                            </div>

                            @if(count($pessoafisica->atribuicoes) > 0)

                                <div class="flex mb-1">
                                    <div class="w-24 h-12 py-2 text-center bg-gray-200"><span class="font-bold"></span></div>
                                    <div class="w-full h-12 text-center bg-gray-200"><span class="font-bold">Descrição</span></div>
                                    <div class="w-24 h-12 py-2 text-center bg-gray-200"><span class="font-bold"></span></div>
                                    @if(isset($admin) && $admin === true)
                                    <div class="w-16 h-12 py-2 mr-3 text-center bg-gray-200"><span class="font-bold">Ação</span></div>
                                    @endif
                                </div>

                                @foreach($pessoafisica->atribuicoes as $atribuicao)

                                    <div class="flex mb-1">
                                        <div class="w-24 h-12 py-2 text-center bg-gray-50"><span class="font-bold"></span></div>
                                        <div class="w-full h-12 py-2 text-center bg-gray-50">{{$atribuicao->descricao_atribuicao ??  ''}}</div>
                                        <div class="w-24 h-12 py-2 text-center bg-gray-50"><span class="font-bold"></span></div>

                                        @if(isset($admin) && $admin === true)

                                            <div class="w-16 h-12 py-2 bg-gray-50 center">
                                            <button x-data="atribuicao()" x-on:click.prevent="deletarAtribuicao({{$atribuicao->codigo_atribuicao}})" class="font-bold text-red-700 bg-transparent border border-red-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            </div>
                                            <input type='hidden' x-data="atribuicao()"  x-model="atribuicao.codigo_atribuicao" id="codigo_atribuicao" name="codigo_atribuicao" value="{{$atribuicao->codigo_atribuicao}}" />

                                        @endif
                                            </div>

                                @endforeach

                            @else
                                <div class="max-w-full mt-5 overflow-hidden rounded shadow-lg">
                                    <div class="px-10 py-4 bg-gray-50">
                                        <div class="mb-2 text-xl font-bold text-alert-info"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Não há registro</div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="divConclusao" ref="divConclusao" x-show="tab === 'divConclusao'">

                <div class='py-3 overflow-hidden bg-white shadow-xl sm:rounded-lg'>
                    <form x-model='frmConcluso' id='frmConclusao' name='frmConclusao' method='POST' x-on:click.prevent="" x-data="conclusao()">
                         @csrf
                        <div class='py-3 row col-md-6'>ddfasdfasdfasdfadfasdfasd</div>
                    </form>
                </div>

            </div>


        </div>
    </div>

{{-- </x-app-layout> --}}

</body>
</html>
