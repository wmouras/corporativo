<x-app-layout>
    <x-slot name="header">
        <h2 class='text-xl font-semibold leading-tight text-gray-800'>
            Cadastro Empresa
        </h2>
    </x-slot>

    <div class='py-1'>

        <div x-data="{ tab: 'divDescricao' }" >

                <div class='mx-auto text-center max-w-7xl sm:px-6 lg:px-8'>
                    <button :class="{ 'focus:shadow-outline-blue focus:bg-blue-100': tab === 'divDescricao' }" class="inline w-64 px-12 py-3 mb-1 leading-tight border rounded border-grey-100" @click="tab = 'divDescricao'">
                        <b>Descrição</b>
                    </button>
                    <button :class="{ 'focus:shadow-outline-blue focus:bg-blue-100': tab === 'divContato' }" class="inline w-64 px-12 py-3 mb-1 leading-tight border rounded border-grey-100" @click="tab = 'divContato'">
                        <b>Contato</b>
                    </button>
                    <button :class="{ 'focus:shadow-outline-blue focus:bg-blue-100': tab === 'divRegistro' }" class="inline w-64 px-12 py-3 mb-1 leading-tight border rounded border-grey-100" @click="tab = 'divRegistro'">
                        <b>Registro</b>
                    </button>
                     @if($admin)
                        <button :class="{ 'focus:shadow-outline-blue focus:bg-blue-100': tab === 'divConclusao' }" class="inline w-64 px-12 py-3 mb-1 leading-tight border rounded border-grey-100" @click="tab = 'divConclusao'">
                            <b>Conclusão</b>
                        </button>
                    @endif
                </div>

            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="divDescricao" ref="divDescricao" x-show="tab === 'divDescricao'">

                <div class='overflow-hidden bg-white shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>
                        <form x-model='frmEmpresa' id='frmPF' name='frmPF' method='POST' x-on:click.prevent=""
                            x-data="empresa()">
                            @csrf

                            <div class="flex w-full px-3">
                                <div class="px-3 py-3 text-left w-54">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cnpj'>
                                        CNPJ
                                    </label>
                                    <input {{$editar ?? null}} x-model="empresa.cnpj" id='cnpj' name='cnpj' type='text' placeholder='Insira o cnpj' value=""
                                    class='block py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w- bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>
                                <div class="px-3 py-3 ml-3 text-left w-54">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='email'>
                                        E-mail
                                    </label>
                                    <input {{$editar ?? null}} x-model="empresa.email" id='email' name='email' type='email' placeholder='Insira o e-mail' value=""
                                    class='block py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-80 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>
                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>

                            </div>

                            <div class="w-full px-3">
                                 <div class="w-full py-3 ml-3 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='razao_social'>
                                        Razão Social
                                    </label>
                                <input {{$editar ?? null}} x-model="empresa.razao_social" id='razao_social' name='razao_social' type='text' placeholder='Insira a razão social' value=""
                                    class='block w-1/2 px-3 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>
                            </div>

                            <div class="w-full px-3">
                                <div class="w-full py-3 ml-3 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='nome_fantasia'>
                                        Nome Fantasia
                                    </label>
                                    <input {{$editar ?? null}} x-model="empresa.nome_fantasia" id='nome_fantasia' name='nome_fantasia' type='text' placeholder='Insira o nome fantasia' value=""
                                    class='block w-1/2 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>
                            </div>

                            <div class="flex w-full px-3">
                                <div class="w-64 px-3 py-3 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_id_tipo_empresa'>
                                        Tipo Empresa
                                    </label>
                                    <select {{$editar ?? null}}  x-model="empresa.fk_id_tipo_empresa"
                                    class='block w-64 px-3 py-3 mb-3 leading-tight text-gray-700 border rounded bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'
                                        name="fk_id_tipo_empresa" id="fk_id_tipo_empresa" >
                                            <option value="99">Selecione...</option>
                                            @foreach ($pessoajuridica->tipoEmpresa as $empresa)
                                                <option value="{{$empresa->id_tipo_empresa}}"
                                                    @if ($pessoajuridica->fk_id_tipo_empresa == $empresa->id_tipo_empresa)
                                                        selected
                                                    @endif >
                                                {{ $empresa->tipo_empresa }}
                                            </option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="w-64 px-3 py-3 ml-6 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_id_tipo_estabelecimento'>
                                        Tipo Estabelecimento
                                    </label>
                                    <select {{$editar ?? null}} class='block w-64 px-3 py-3 mb-3 leading-tight text-gray-700 border rounded bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'
                                        name="fk_id_tipo_estabelecimento" id="fk_id_tipo_estabelecimento" >
                                            <option value="99">Selecione...</option>
                                            @foreach ($pessoajuridica->tipoEstabelecimento as $estabelecimento)
                                                <option value="{{$estabelecimento->id_tipo_estabelecimento}}"
                                                    @if ($pessoajuridica->fk_id_tipo_estabelecimento == $estabelecimento->id_tipo_estabelecimento)
                                                        selected
                                                    @endif >
                                                {{ trim($estabelecimento->tipo_estabelecimento) }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex w-full px-3">
                                <div class='w-64 px-3 text-left'>
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='capital_social'>
                                        Capital Social
                                    </label>
                                    <input {{$editar ?? null}} x-model="empresa.capital_social" id='capital_social' name='capital_social' type='text' placeholder='Capital Social'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none vl-capital-social w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>
                                <div class="w-1/4 px-3 text-left md:w-1/2 md:mb-0">
                                    <label class='block mb-2 ml-6 text-xs font-bold tracking-wide text-gray-700 uppercase' for='capital_filial'>
                                        Capital Filial
                                    </label>
                                    <input {{$editar ?? null}} x-model="empresa.capital_filial" id='capital_filial' name='capital_filial' type='text' placeholder='Capital Filial'
                                    class='block px-4 py-3 mb-3 ml-6 leading-tight text-gray-700 border rounded appearance-none vl-capital-filial w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>
                            </div>

                            <div class="w-full px-3">
                                <div class='w-64 px-3 text-left'>
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='dt_ultima_alt_capital'>
                                        Dt Últ Alteração do capital
                                    </label>
                                    <input {{$editar ?? null}} x-model="empresa.dt_ultima_alt_capital" id='dt_ultima_alt_capital' name='dt_ultima_alt_capital' type='text' placeholder='Data Última Alteração de capital'
                                        class='block px-3 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-54 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>
                            </div>

                            <div class="flex w-full px-3">
                                <div class="w-64 px-3 py-3 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='nr_ultima_alt_contratual'>
                                        N° Últ Alteração Contratual
                                    </label>
                                        <input {{$editar ?? null}} x-model="empresa.nr_ultima_alt_contratual" id='nr_ultima_alt_contratual' name='nr_ultima_alt_contratual' type='text' placeholder='Número da Última Alteração de Contratual'
                                            class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>
                                <div class="w-64 px-3 py-3 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='nr_ultima_alt_contratual'>
                                        Dt Últ Alteração Contratual
                                    </label>
                                        <input {{$editar ?? null}} x-model="empresa.dt_ultima_alt_contratual" id='dt_ultima_alt_contratual' name='dt_ultima_alt_contratual' type='text' placeholder='Data da Última Alteração de Contratual'
                                            class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                            </fieldset>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <div class="px-3 py-3 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='objetivo_social'>
                                        Objetivo Social
                                    </label>
                                    <textarea {{$editar ?? null}} x-model="empresa.objetivo_social" id='objetivo_social' name='objetivo_social'  placeholder='Insira o Objetivo Social' class='block w-full h-32 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none resize bg-gray-50 border-blue-50 focus:outline-none focus:bg-white focus:shadow-outline'></textarea>
                                </div>
                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <div class="px-3 py-3 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='socios'>
                                        Sócios
                                    </label>
                                    <textarea {{$editar ?? null}} x-model="empresa.socios" id='socios' name='socios'  placeholder='Insira os sócios' class='block w-full h-32 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none resize bg-gray-50 border-blue-50 focus:outline-none focus:bg-white focus:shadow-outline'></textarea>
                                </div>
                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <div class="px-3 py-3 text-left">
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='observacoes'>
                                        Observação
                                    </label>
                                    <textarea {{$editar ?? null}} x-model="empresa.observacoes" id='observacoes' name='observacoes'  placeholder='Insira as observações' class='block w-full h-32 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none resize bg-gray-50 border-blue-50 focus:outline-none focus:bg-white focus:shadow-outline'></textarea>
                                </div>
                            </div>

                            <input id='field' name='field' type='hidden' />


                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                            @if($admin)
                                <button type='button' {{$editar ?? null}} x-on:click.prevent="salvarEmpresa()" class='px-4 py-2 mt-8 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 center'>
                                    Salvar
                                </button>
                            @endif
                            </div>

                        </form>

                    </div>

                </div>
            </div>

            <!-- Aba de cadastro de contato e endereço -->

            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="divContato" ref="divContato" x-show="tab === 'divContato'">

                <div class='py-3 overflow-hidden bg-white shadow-xl sm:rounded-lg'>

                    <form x-model='frmEnder' id='frmEnd' name='frmEnd' method='POST' x-on:click.prevent="" x-data="endereco()">
                         @csrf
                        <div class='py-3 row col-md-6'>

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

                            <input x-model="frmEndereco.correspondencia.id_endereco2" id='id_endereco2' name='id_endereco2' type='hidden' />

                            <input x-model="frmEndereco.correspondencia.fk_id_bairro" id='fk_id_bairro2' name='fk_id_bairro2' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_cidade" id='fk_id_cidade2' name='fk_id_cidade2' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_logradouro" id='fk_id_logradouro2' name='fk_id_logradouro2' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_tipologradouro" id='fk_id_tipologradouro2' name='fk_id_tipologradouro2' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.id_endereco" id='id_endereco' name='id_endereco' type='hidden' />

                        </div>
                        <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                            <button type='button' x-on:click.prevent="salvarEndereco()" class='px-4 py-2 mt-12 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 center'>
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="divRegistro" ref="divRegistro" x-show="tab === 'divRegistro'">

                <div class='overflow-hidden bg-white shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>
                            <div class='flex w-full md:w-1/2 md:mb-0'>
                                <div class='flex-auto px-3 mb-6 md:w-1/2 md:mb-0'>
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='registro'>
                                        Registro
                                    </label>
                                    <div id='registro' class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-half-width bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                        {{$pessoajuridica->numero_carteira}}
                                    </div>
                                </div>
                            </div>

                            <div class="max-w-full mt-5 overflow-hidden rounded">

                                <div class="px-10 py-4">
                                        <div class="mb-2 text-xl font-bold"> Quadro Técnico&nbsp;</div>
                                </div>

                                @if( count($pessoajuridica->quadros) > 0)

                                <div class="flex mb-2">
                                    <div class="w-1/4 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Empresa</span></div>
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Início</span></div>
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Validade</span></div>
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Baixa</span></div>
                                    @if($admin)
                                    <div class="w-1/6 h-12 py-2 text-center bg-gray-200"><span class="font-bold">Ação</span></div>
                                    @endif
                                </div>

                                @foreach($pessoajuridica->quadros as $quadro)

                                    <div class="flex mb-1">
                                        <div class="w-1/4 h-12 py-3 text-center bg-gray-50">{{$quadro->razao_social ??  ''}}</div>
                                        <div class="w-1/6 h-12 py-3 text-center bg-gray-50">{{$quadro->data_inicio ??  ''}}</div>
                                        <div class="w-1/6 h-12 py-3 text-center bg-gray-50">{{$quadro->data_validade ??  ''}}</div>
                                        <div class="w-1/6 h-12 py-3 text-center bg-gray-50">{{$quadro->data_baixa ??  ''}}</div>
                                        @if($admin)
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

                    </div>

                </div>

            </div>

            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="divConclusao" ref="divConclusao" x-show="tab === 'divConclusao'">

                <div class='py-3 overflow-hidden bg-white shadow-xl sm:rounded-lg'>
                    <form x-model='frmConcluso' id='frmConclusao' name='frmConclusao' method='POST' x-on:click.prevent="" x-data="conclusao()">
                         @csrf
                        <div class='py-3 row col-md-6'>Conclusão</div>
                    </form>
                </div>

            </div>


        </div>
    </div>

    <script type="text/javascript">

        function empresa(){

            return {
                empresa: {
                    fk_id_pessoa: '{{$pessoajuridica->id_pessoa}}',
                    razao_social: '{{$pessoajuridica->razao_social}}',
                    nome_fantasia: '{{$pessoajuridica->nome_fantasia}}',
                    cnpj: '{{$pessoajuridica->cnpj}}',
                    email: '{{$pessoajuridica->email_empresa}}',
                    fk_id_tipo_empresa: '{{$pessoajuridica->fk_id_tipo_empresa}}',
                    fk_id_tipo_estabelecimento: '{{$pessoajuridica->fk_id_tipo_estabelecimento}}',
                    capital_social: 'R$ {{ number_format($pessoajuridica->capital_social, 2, ",", ".")}}',
                    capital_filial: 'R$ {{ number_format($pessoajuridica->capital_filial, 2, ",", ".")}}',
                    dt_ultima_alt_capital: '{{$pessoajuridica->dt_ultima_alt_capital}}',
                    nr_ultima_alt_contratual: '{{$pessoajuridica->nr_ultima_alt_contratual}}',
                    dt_ultima_alt_contratual: '{{$pessoajuridica->dt_ultima_alt_contratual}}',
                    objetivo_social: `{{$pessoajuridica->objetivo_social}}`,
                    observacoes: `{{$pessoajuridica->observacoes}}`,
                    socios: `{{$pessoajuridica->socios}}`,
                    usuario: '{{$pessoajuridica->usuario}}',
                    data_cadastro: '{{$pessoajuridica->data_cadastro}}',
                    data_alteracao: '{{$pessoajuridica->data_alteracao}}',
                    infoMessage: false,
                },
                frmEmpresa: null,
                salvarEmpresa(){
                    alert( 'OK' );
                    axios({
                        method: 'post',
                        url: '{{route('pessoajuridica.salvar')}}',
                        data: this.empresa
                    })
                    .then(
                        (response) => {
                            if(response.data.status == 'success'){
                                $('#msgInfo').text(response.data.msg);
                                $('#dvInfo').show();
                                $('#cnpj').focus();
                            }else{
                                $('#msgInfo').text(response.data.msg);
                                $('#dvInfo').show();
                                $('#cnpj').focus();
                                $("#dvInfo").removeClass();
                                $("#dvInfo").addClass("text-white px-6 py-4 border-0 rounded relative mb-4 bg-orange-200");
                            }

                        }, (error) => {
                            console.log(error);
                            $('#msgInfo').text("O sistema retorbou um erro interno. Contate a ATI.");
                            $('#dvInfo').show();
                            $('#cnpj').focus();
                            $("#dvInfo").removeClass();
                            $("#dvInfo").addClass("text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-200");
                        }
                    );


                },
            }

        }

        function endereco(){

            return {
                frmEnder: null,
                frmEndereco: {
                    empresa: {
                        id_endereco: '{{$pessoajuridica->endereco->id_endereco}}',
                        cep: '{{$pessoajuridica->endereco->cep}}',
                        fk_id_pessoa: '{{$pessoajuridica->endereco->fk_id_pessoa}}',
                        logradouro: '{{$pessoajuridica->endereco->logradouro}}',
                        numero: '{{$pessoajuridica->endereco->numero}}',
                        estado: '{{$pessoajuridica->endereco->estado}}',
                        cidade: '{{$pessoajuridica->endereco->cidade}}',
                        bairro: '{{$pessoajuridica->endereco->bairro}}',
                        complemento: '{{$pessoajuridica->endereco->complemento}}',
                        fk_id_bairro: '{{$pessoajuridica->endereco->fk_id_bairro}}',
                        fk_id_cidade: '{{$pessoajuridica->endereco->fk_id_cidade}}',
                        fk_id_logradouro: '{{$pessoajuridica->endereco->fk_id_logradouro}}',
                        fk_id_tipologradouro: '{{$pessoajuridica->endereco->fk_id_tipologradouro}}',
                    },
                    st_correspondencia: true,
                    correspondencia: {
                        id_endereco: '{{$pessoajuridica->correspondencia->id_endereco}}',
                        cep: '{{ $pessoajuridica->correspondencia->cep }}',
                        fk_id_pessoa: '{{ $pessoajuridica->endereco->fk_id_pessoa }}',
                        logradouro: '{{ $pessoajuridica->correspondencia->logradouro }}',
                        numero: "{{ $pessoajuridica->correspondencia->numero }}",
                        estado: '{{ $pessoajuridica->correspondencia->estado }}',
                        cidade: '{{ $pessoajuridica->correspondencia->cidade }}',
                        bairro: '{{ $pessoajuridica->correspondencia->bairro }}',
                        complemento: '{{ $pessoajuridica->correspondencia->complemento }}',
                        fk_id_bairro: '{{ $pessoajuridica->correspondencia->fk_id_bairro }}',
                        fk_id_cidade: '{{ $pessoajuridica->correspondencia->fk_id_cidade }}',
                        fk_id_logradouro: '{{ $pessoajuridica->correspondencia->fk_id_logradouro }}',
                        fk_id_tipologradouro: '{{ $pessoajuridica->correspondencia->fk_id_tipologradouro }}',
                    }


                },
                marcarBox(){
                    this.frmEndereco.st_correspondencia = !this.frmEndereco.st_correspondencia;

                    if(this.frmEndereco.st_correspondencia){
                        document.getElementById('dvCorrespondencia').style.display = 'none';
                    }else{
                        document.getElementById('dvCorrespondencia').style.display = 'block';
                    }
                },
                salvarEndereco(){

                    axios({
                        method: 'post',
                        url: '{{route('endereco.update')}}',
                        data: this.frmEndereco
                    });

                },
                getEnderecoCep(){

                    endereco = fetch( '/endereco/cep/'+document.getElementById("cep").value ).then( res => res.json() )
                    .then( data => {
                        endereco = data;
                        document.getElementById("logradouro").value = endereco.logradouro;
                        document.getElementById("bairro").value = endereco.bairro;
                        document.getElementById("cidade").value = endereco.cidade;
                        document.getElementById("estado").value = endereco.estado;
                        document.getElementById("fk_id_bairro").value = endereco.fk_id_bairro;
                        document.getElementById("fk_id_cidade").value = endereco.fk_id_cidade;
                        document.getElementById("fk_id_logradouro").value = endereco.fk_id_logradouro
                        document.getElementById("fk_id_tipologradouro").value = endereco.fk_id_tipologradouro;

                        this.frmEndereco.empresa.logradouro = endereco.logradouro;
                        this.frmEndereco.empresa.bairro = endereco.bairro;
                        this.frmEndereco.empresa.cidade = endereco.cidade;
                        this.frmEndereco.empresa.estado = endereco.estado;
                        this.frmEndereco.empresa.fk_id_bairro = endereco.fk_id_bairro;
                        this.frmEndereco.empresa.fk_id_cidade = endereco.fk_id_cidade;
                        this.frmEndereco.empresa.fk_id_logradouro = endereco.fk_id_logradouro
                        this.frmEndereco.empresa.fk_id_tipologradouro = endereco.fk_id_tipologradouro;

                    } );

                },
                getEnderecoCepCorrespondecia(){
                    resp = fetch('/endereco/cep/'+document.getElementById("cepCorrespondencia").value).then(resp => resp.json())
                    .then(
                        data => {
                        correspondencia = data;
                        document.getElementById("logradouroCorrespondencia").value = correspondencia.logradouro;
                        document.getElementById("bairroCorrespondencia").value = correspondencia.bairro;
                        document.getElementById("cidadeCorrespondencia").value = correspondencia.cidade;
                        document.getElementById("estadoCorrespondencia").value = correspondencia.estado;
                        document.getElementById("fk_id_bairro2").value = correspondencia.fk_id_bairro;
                        document.getElementById("fk_id_cidade2").value = correspondencia.fk_id_cidade;
                        document.getElementById("fk_id_logradouro2").value = correspondencia.fk_id_logradouro
                        document.getElementById("fk_id_tipologradouro2").value = correspondencia.fk_id_tipologradouro;

                        this.frmEndereco.correspondencia.logradouro = correspondencia.logradouro;
                        this.frmEndereco.correspondencia.bairro = correspondencia.bairro;
                        this.frmEndereco.correspondencia.cidade = correspondencia.cidade;
                        this.frmEndereco.correspondencia.estado = correspondencia.estado;
                        this.frmEndereco.correspondencia.fk_id_bairro = correspondencia.fk_id_bairro;
                        this.frmEndereco.correspondencia.fk_id_cidade = correspondencia.fk_id_cidade;
                        this.frmEndereco.correspondencia.fk_id_logradouro = correspondencia.fk_id_logradouro
                        this.frmEndereco.correspondencia.fk_id_tipologradouro = correspondencia.fk_id_tipologradouro;

                    });



                }

            }

        }

        function registro()
        {
            return {
                quadro: {
                    fk_codigo_titulo_confea: '',
                    fk_id_registro_profissional: '',
                    instituicao_ensino: '',
                    data_conclusao_curso: '',
                    data_diploma: '',
                    fk_numero_processo: '',
                    principal: '',
                    titulos: [],
                },
                frmfrmQuadroTecnico: null,
                frmTitulo: null,
                salvarQuadroTecnico(){
                    axios({
                        method: 'post',
                        url: "{{route('quadrotecnico.salvar')}}",
                        data: this.quadro,
                        });
                },
                showModalTitulo: false,
                deletarQuadroTecnico(idTitulo){

                    axios({
                        method: 'post',
                        url: "{{route('quadrotecnico.delete')}}",
                        data: {'idTitulo': idTitulo},
                    }).then(
                        response =>{
                            if(response.data.status == 'sucesso'){
                                window.location.reload();
                            }
                        }
                    ).catch(err =>{
                        console.log(err);
                    });
                }
            }
        }

        function conclusao()
        {

            return{
                conclusao: {

                },
                frmConclusao: null,
                frmConcluso: null,
                enviarRegistroProfissional(){

                    axios({
                        method: 'post',
                        url: '{{ route("atribuicao.salvar") }}',
                        data: this.atribuicao,
                        }).then(response =>{
                            if(response.data.status == 'sucesso') {
                                window.location.reload();
                            }
                        }
                    ).catch(err =>{
                        console.log(err);
                    });

                },

            }

        }

        VMasker(document.getElementById("dt_ultima_alt_capital")).maskPattern('99/99/9999');
        VMasker(document.getElementById("dt_ultima_alt_contratual")).maskPattern('99/99/9999');
        VMasker(document.getElementById("cnpj")).maskPattern('99.999.999/9999-99');
        VMasker(document.getElementById("cep")).maskPattern('99.999-999');
        VMasker(document.getElementById("cepCorrespondencia")).maskPattern('99.999-999');

        VMasker(document.querySelector(".vl-capital-social")).maskMoney({precision: 2, unit: 'R$', separator: ',', delimiter: '.', zeroCents: false });
        VMasker(document.querySelector(".vl-capital-filial")).maskMoney({precision: 2, unit: 'R$', separator: ',', delimiter: '.', zeroCents: false });

    </script>

</x-app-layout>
