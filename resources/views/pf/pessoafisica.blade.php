<x-app-layout>
    <x-slot name="header">
        <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
            Cadastro Pessoa Física
        </h2>
    </x-slot>

    <div class='py-1'>

        <div x-data="{ tab: 'divRegistro' }" >

                <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
                    <button :class="{ 'focus:shadow-outline-blue focus:bg-blue-100': tab === 'divDescricao' }" class="inline w-65 border border-grey-100 rounded py-3 px-36 mb-1 leading-tight" @click="tab = 'divDescricao'">
                        <b>Descrição</b>
                    </button>
                    <button :class="{ 'focus:shadow-outline-blue focus:bg-blue-100': tab === 'divContato' }" class="inline w-65 border border-grey-100 rounded py-3 px-36 mb-1 leading-tight" @click="tab = 'divContato'">
                        <b>Contato</b>
                    </button>
                    <button :class="{ 'focus:shadow-outline-blue focus:bg-blue-100': tab === 'divRegistro' }" class="inline w-65 border border-grey-100 rounded py-3 px-36 mb-1 leading-tight" @click="tab = 'divRegistro'">
                        <b>Registro</b>
                    </button>
                </div>

            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="divDescricao" ref="divDescricao" x-show="tab === 'divDescricao'">

                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>
                        <form x-model='frmPessoa' id='frmPF' name='frmPF' method='POST' x-on:click.prevent=""
                            x-data="profissional({data: {{$pessoafisica->cidades}} })">
                            @csrf

                            <div class="w-full px-3 flex">
                                <div class="w-1/6 text-left py-3">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                        CPF
                                    </label>
                                    <input {{$editar}} x-model="frmData.cpf" id='cpf' name='cpf' type='text' placeholder='Insira o cpf' value=""
                                    class='appearance-none block w-48 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>
                                <div class="w-1/4 text-left py-3 ml-3">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                        E-mail
                                    </label>
                                    <input {{$editar}} x-model="frmData.email" id='email' name='email' type='email' placeholder='Insira o e-mail' value=""
                                    class='appearance-none block w-80 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>
                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome'>
                                    Nome
                                </label>
                                <input {{$editar}} x-model="frmData.nome" id='nome' name='nome' type='text' placeholder='Insira o nome' value=""
                                    class='appearance-none block w-1/2 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                             <div class="w-full px-3 flex">
                                <div class="w-1/6 text-left py-3">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                         Identidade(RG)
                                    </label>
                                    <input {{$editar}} x-model="frmData.identidade" id='identidade' name='identidade' type='text' placeholder='Insira o RG' value=""
                                    class='appearance-none block w-48 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>
                                <div class="w-1/4 text-left py-3 ml-3">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                        Data de emissao
                                    </label>
                                    <input {{$editar}} x-model="frmData.data_emissao_identidade" id='data_emissao_identidade' name='data_emissao_identidade' type='text' placeholder='Insira a data de emissão' value=""
                                    class='appearance-none block w-80 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>
                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_nascimento'>
                                    Data nascimento
                                </label>
                                <input {{$editar}} x-model="frmData.data_nascimento" id='data_nascimento' name='data_nascimento' type='text' placeholder='Insira o data_nascimento'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-44 md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_empresa'>
                                    Possui alguma deficência?
                                </label>
                                <select {{$editar}} class='w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'
                                    name="id_deficiencia" id="id_deficiencia" >
                                        <option value="99'">Selecione...</option>
                                        <option value="1'">SIM</option>
                                        <option value="0">NÃO</option>

                                </select>
                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='fk_cd_nacionalidade'>
                                    Nacionalidade
                                </label>
                                <select {{$editar}} x-model="frmData.fk_cd_nacionalidade" name="fk_cd_nacionalidade" id="fk_cd_nacionalidade" placeholder='Insira sua nacionalidade'
                                    class='w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    @foreach ($pessoafisica->listaNacionalidade as $nacionalidade)
                                        <option value='{{ $nacionalidade["cd_nacionalidade"] }}'
                                            @if( $nacionalidade["cd_nacionalidade"] == $pessoafisica["fk_cd_nacionalidade"] )
                                                selected
                                            @endif
                                        >{{ $nacionalidade['nacionalidade'] }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='fk_id_naturalidade'>
                                    Naturalidade
                                </label>
                                <div class="flex">
                                    <select {{$editar}} name="fk_id_uf" id="fk_id_uf" placeholder='Selecione a UF' @change="listaCidade( this.fk_id_uf.value )"
                                            class='flex-auto w-16 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 mr-3 leading-tight focus:outline-none focus:bg-white'>
                                        <option value="XX">Selecione</option>
                                        @foreach ($pessoafisica->listaUf as $uf)
                                            <option value="{{ $uf->pk_uf }}"
                                            @if ($uf->pk_uf == $pessoafisica->fk_id_uf)
                                                selected
                                            @endif >{{ $uf->descricao_uf }}</option>
                                        @endforeach
                                    </select>

                                    <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                        <select {{$editar}} x-model="frmData.fk_id_naturalidade" class='flex-auto w-full block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'
                                            name="fk_id_naturalidade" id="fk_id_naturalidade" >
                                            <template x-for="cidade in frmData.cidades" :key="cidade.pk_cidade">
                                                <option :value="cidade.pk_cidade" x-text="cidade.nome_cidade" x-bind:selected="cidade.pk_cidade === {{$pessoafisica->fk_id_naturalidade ?? 0}}"></option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="" value="Parentesco">
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome_parentesco1'>
                                    Parentesco
                                </label>
                                <div class='w-full flex md:w-1/2 px-3 mb-6 md:mb-0'>

                                    <input {{$editar}} x-model="frmData.parentesco1.nome" id='nome_parentesco1' name='nome_parentesco1' type='text' placeholder='Insira o nome'
                                        class='appearance-none block w-80 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <select {{$editar}} x-model="frmData.parentesco1.fk_id_tipo_parentesco" name="grau_parentesco1" id="grau_parentesco1" class='ml-5 w-32 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                        <option value="0">Grau...</option>
                                        <option value="1" @if($pessoafisica->parentesco1->fk_id_tipo_parentesco == '1') { selected @endif }>Mãe</option>
                                        <option value="2" @if($pessoafisica->parentesco1->fk_id_tipo_parentesco == '2') { selected @endif }>Pai</option>
                                    </select>


                                </div>

                                <div class='w-full flex md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <input {{$editar}} x-model="frmData.parentesco2.nome" id='nome_parentesco2' name='nome_parentesco2' type='text' placeholder='Insira o nome'
                                        class='appearance-none block w-80 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <select {{$editar}} x-model="frmData.parentesco2.fk_id_tipo_parentesco" name="grau_parentesco2" id="grau_parentesco2" class='ml-5 w-32 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                        <option value="0">Grau...</option>
                                        <option value="1" @if($pessoafisica->parentesco2->fk_id_tipo_parentesco == '1') { selected @endif }>Mãe</option>
                                        <option value="2" @if($pessoafisica->parentesco2->fk_id_tipo_parentesco == '2') { selected @endif }>Pai</option>
                                    </select>

                                </div>
                            </fieldset>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='sexo'>
                                    Sexo
                                </label>
                                <select {{$editar}} x-model="frmData.sexo" name="sexo" id="sexo" class='w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <option value="0">Selecione</option>
                                    <option value="1" @if($pessoafisica->sexo == '1') selected @endif>Masculino</option>
                                    <option value="2" @if($pessoafisica->sexo == '2') selected @endif>Feminino</option>
                                </select>
                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_sangue'>
                                    tipo sanguíneo
                                </label>
                                <input {{$editar}} x-model="frmData.tipo_sangue" id='tipo_sangue' name='tipo_sangue' type='text' placeholder='Insira o tipo sanguíneo' value="{{ $pessoafisica->tipo_sangue }}"
                                    class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex w-full md:w-1/2 md:mb-0'>
                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='titulo_eleitor'>
                                        título eleitor
                                    </label>
                                    <input {{$editar}} x-model="frmData.titulo_eleitor" id='titulo_eleitor' name='titulo_eleitor' type='text' placeholder='Insira o titulo_eleitor'
                                        class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='zona_titulo_eleitor'>
                                        zona título eleitor
                                    </label>
                                    <input {{$editar}} x-model="frmData.zona_titulo_eleitor" id='zona_titulo_eleitor' name='zona_titulo_eleitor' type='text' placeholder='Insira o zona_titulo_eleitor'
                                        class='appearance-none block w-28 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='secao_titulo_eleitor'>
                                        Seção título eleitor
                                    </label>
                                    <input {{$editar}} x-model="frmData.secao_titulo_eleitor" id='secao_titulo_eleitor' name='secao_titulo_eleitor' type='text' placeholder='Insira o secao_titulo_eleitor'
                                        class='appearance-none block w-28 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='observacao'>
                                    Observação
                                </label>

                                <textarea {{$editar}} x-model="frmData.observacao" id='observacao' name='observacao'  placeholder='Insira as observações' value="{{ $pessoafisica->observacao }}" class='appearance-none block w-full h-32 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white resize border rounded focus:outline-none focus:shadow-outline'></textarea>
                            </div>

                            <input id='field' name='field' type='hidden' />


                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                            @if($admin)
                                <button type='button' {{$editar}} x-on:click.prevent="salvarProfissional()" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-8 center'>
                                    Salvar
                                </button>
                            @endif
                            </div>

                        </form>

                    </div>

                </div>
            </div>

            <!-- Aba de cadastro de contato e endereço -->

            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="divContato" ref="divContato" x-show="tab === 'divContato'">

                <div class='bg-white py-3 overflow-hidden shadow-xl sm:rounded-lg'>

                    <form x-model='frmEnder' id='frmEnd' name='frmEnd' method='POST' x-on:click.prevent="" x-data="endereco()">
                         @csrf
                        <div class='row col-md-6 py-3'>

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/5 mb-4 h-12 mr-5">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cep'>
                                        CEP
                                    </label>
                                    <input x-on:click.prevent="" x-model="frmEndereco.empresa.cep" id='cep' name='cep' type='text' placeholder='Insira o cep'
                                        class='appearance-none inline w-44 bg-gray-50 text-center text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <button id="busca" x-on:click="getEnderecoCep()" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-full h-9 w-9">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                                    <div class="w-1/3 mb-4 h-12">
                                        <label class='w-full block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='logradouro'>
                                        Logradouro
                                    </label>
                                    <input x-model="frmEndereco.empresa.logradouro" id='logradouro' name='logradouro' type='text' placeholder='Insira o logradouro'
                                        class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 mb-4 h-12 ml-5">
                                    <label class='w-20 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='numero'>
                                        Nº
                                    </label>
                                    <input x-model="frmEndereco.empresa.numero" id='numero' name='numero' type='text' placeholder='Insira o número'
                                        class='appearance-none block w-16 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                            </div>
                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/6 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='estado'>
                                    Estado
                                </label>
                                <input x-model="frmEndereco.empresa.estado" id='estado' name='estado' type='text' placeholder='Insira a UF'
                                    class='appearance-none w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cidade'>
                                        Cidade
                                    </label>
                                    <input x-model="frmEndereco.empresa.cidade" id='cidade' name='cidade' type='text' placeholder='Escolha a cidade'
                                        class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/4 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='bairro'>
                                        Bairro
                                    </label>
                                    <input x-model="frmEndereco.empresa.bairro" id='bairro' name='bairro' type='text' placeholder='Insira o bairro'
                                        class='appearance-none w-full block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                            </div>

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/4 mb-4 h-12">
                                   <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='complemento'>
                                    Complemento
                                </label>
                                <input  x-model="frmEndereco.empresa.complemento" id='complemento' name='complemento' type='text' placeholder='Insira o complemento'
                                    class='appearance-none w-full block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                            <div class=" flex w-65 mt-7 mb-10" @click="marcarBox()">
                                <label class="switch w-65">
                                    <input type="checkbox" x-model="frmEndereco.st_correspondencia" :value="st_correspondencia" id="st_correspondencia" name="st_correspondencia" checked />
                                    <span class="slider round w-65"></span>

                                </label>
                                <div class="flex-auto w-65 mt-1">
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


                        <div class='row col-md-6 ml-3 transition-all' style="display: none;" id="dvCorrespondencia" name="dvCorrespondencia">

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/5 mb-4 h-12 mr-5">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cepCorrespondencia'>
                                        CEP
                                    </label>
                                    <input x-on:key.prevent="" x-model="frmEndereco.correspondencia.cep" id='cepCorrespondencia' name='cepCorrespondencia' type='text' placeholder='Insira o cep'
                                        class='appearance-none inline w-44 bg-gray-50 text-center text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <button id="get-endereco" x-on:click.prevent="getEnderecoCepCorrespondecia()" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-full h-9 w-9">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                                    <div class="w-1/3 mb-4 h-12">
                                        <label class='w-full block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='logradouroCorrespondencia'>
                                        Logradouro
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.logradouro" id='logradouroCorrespondencia' name='logradouroCorrespondencia' type='text' placeholder='Insira o logradouro'
                                        class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 mb-4 h-12 ml-5">
                                    <label class='w-20 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='numero'>
                                        Nº
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.numero" id='numeroCorrespondencia' name='numeroCorrespondencia' type='text' placeholder='Insira o número'
                                        class='appearance-none block w-16 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                            </div>
                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/6 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='estado'>
                                    Estado
                                </label>
                                <input x-model="frmEndereco.correspondencia.estado" id='estadoCorrespondencia' name='estadoCorrespondencia' type='text' placeholder='Insira a UF'
                                    class='appearance-none w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cidade'>
                                        Cidade
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.cidade" id='cidadeCorrespondencia' name='cidadeCorrespondencia' type='text' placeholder='Escolha a cidade'
                                        class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>
                                <div class="w-1/4 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='bairro'>
                                        Bairro
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.bairro" id='bairroCorrespondencia' name='bairroCorrespondencia' type='text' placeholder='Insira o bairro'
                                        class='appearance-none w-full block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/4 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='complemento'>
                                    Complemento
                                </label>
                                <input x-model="frmEndereco.correspondencia.complemento" id='complementoCorrespondencia' name='complementoCorrespondencia' type='text' placeholder='Insira o complemento'
                                    class='appearance-none w-full block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                            <input x-model="frmEndereco.correspondencia.id_endereco2" id='id_endereco2' name='id_endereco2' type='hidden' />

                            <input x-model="frmEndereco.correspondencia.fk_id_bairro" id='fk_id_bairro2' name='fk_id_bairro2' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_cidade" id='fk_id_cidade2' name='fk_id_cidade2' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_logradouro" id='fk_id_logradouro2' name='fk_id_logradouro2' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_tipologradouro" id='fk_id_tipologradouro2' name='fk_id_tipologradouro2' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.id_endereco" id='id_endereco' name='id_endereco' type='hidden' />

                        </div>
                        <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                            <button type='button' x-on:click.prevent="salvarEndereco()" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-12 center'>
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="divRegistro" ref="divRegistro" x-show="tab === 'divRegistro'">

                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>
                            <div class='w-full flex md:w-1/2 md:mb-0'>
                                <div class='flex-auto md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='rnp'>
                                        RNP
                                    </label>
                                    <div id='rnp' class='w-half-width appearance-none block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                        {{$pessoafisica->rnp}}
                                    </div>

                                </div>

                                <div class='flex-auto md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='registro'>
                                        Registro
                                    </label>
                                    <div id='registro' class='w-half-width appearance-none block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                        {{$pessoafisica->numero_carteira}}
                                    </div>
                                </div>
                            </div>

                            <div class="max-w-full rounded overflow-hidden mt-5">

                                <div class="px-10 py-4">
                                        <div class="font-bold text-xl mb-2"> Quadro Técnico&nbsp;</div>
                                </div>

                                @if( !is_array($pessoafisica->quadros) )

                                <div class="flex mb-2">
                                    <div class="w-1/4 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Empresa</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Início</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Validade</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Baixa</span></div>
                                    @if($admin)
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Ação</span></div>
                                    @endif
                                </div>

                                @foreach($pessoafisica->quadros as $quadro)

                                    <div class="flex mb-1">
                                        <div class="w-1/4 bg-gray-50 h-12 text-center py-3">{{$quadro->razao_social ??  ''}}</div>
                                        <div class="w-1/6 bg-gray-50 h-12 text-center py-3">{{$quadro->data_inicio ??  ''}}</div>
                                        <div class="w-1/6 bg-gray-50 h-12 text-center py-3">{{$quadro->data_validade ??  ''}}</div>
                                        <div class="w-1/6 bg-gray-50 h-12 text-center py-3">{{$quadro->data_baixa ??  ''}}</div>
                                        @if($admin)
                                        <div class="w-1/6 bg-gray-50 h-12 text-center py-3">

                                            <button class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <button class="ml-4 bg-transparent hover:bg-blue-500 text-yellow-500 font-bold hover:text-white border border-yellow-300 hover:border-transparent rounded">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>

                                        </div>
                                        @endif
                                    </div>

                                @endforeach

                                @else
                                    <div class="max-w-full rounded overflow-hidden shadow-lg mt-5">
                                        <div class="px-10 py-4 bg-gray-50">
                                            <div class="font-bold text-xl mb-2 text-alert-info"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Não há registro</div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <div class="max-w-full rounded overflow-hidden shadow-lg mt-5">

                                <div class="px-10 py-4">
                                    <div class="font-bold text-xl mb-2"  x-data="registro()">Títulos&nbsp;
                                        @if($admin)
                                            <button id="get-endereco" x-on:click.prevent="showModal = true" title="Adicionar ao quadro técnico" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-full h-9 w-9">
                                                    <i class="fa fa-plus"></i>

                                            </button>
                                            @include('modal.titulo', [])
                                        @endif

                                    </div>

                                </div>

                                @if(count($pessoafisica->titulos) > 0)

                                <div class="flex mb-1">
                                    <div class="w-1/4 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Título</span></div>
                                    <div class="w-full bg-gray-200 h-12 text-center py-2"><span class="font-bold">Instituição</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Data conclusão</span></div>
                                    @if($admin)
                                    <div class="w-1/8 bg-gray-200 h-12 text-center py-2 pr-2"><span class="font-bold">Ação</span></div>
                                    @endif
                                </div>

                                @foreach($pessoafisica->titulos as $titulo)

                                    <div class="flex mb-1">
                                        <div class="w-1/4 bg-gray-50 h-12 text-center py-2">{{$titulo->descricao_masculina ??  ''}}</div>
                                        <div class="w-full bg-gray-50 h-12 text-center py-2">{{$titulo->instituicao_ensino ??  ''}}</div>
                                        <div class="w-1/6 bg-gray-50 h-12 text-center py-2">{{alterarDataMysqlBr($titulo->data_conclusao_curso) ??  ''}}</div>

                                        @if($admin)

                                        <div class="w-1/8 bg-gray-50 h-12 center py-2 pr-2 pl-5">
                                            <button x-data="registro()" x-on:click.prevent="deletarTitulo({{$titulo->id_titulo_profissional}})" class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                            <input type='hidden' x-data="registro()"  x-model="titulo.id_titulo_profissional" id="id_titulo_profissional" name="id_registro_profissional" value="{{$titulo->id_titulo_profissional}}" />

                                        @endif
                                    </div>
                                @endforeach

                                @else
                                    <div class="max-w-full rounded overflow-hidden shadow-lg mt-5">
                                        <div class="px-10 py-4 bg-gray-50">
                                            <div class="font-bold text-xl mb-2 text-alert-info"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Não há registro</div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        <div class="max-w-full rounded overflow-hidden shadow-lg mt-5">

                            <div class="px-10 py-4">
                                <div class="font-bold text-xl mb-2"> Atribuições&nbsp;

                                 @if($admin)
                                    <button id="get-atribuicao" x-on:click.prevent="showModal = true" title="Adicionar ao quadro técnico" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-full h-9 w-9">
                                            <i class="fa fa-plus"></i>
                                    </button>
                                @endif
                                </div>
                            </div>

                            @if(count($pessoafisica->atribuicoes) > 0)

                                <div class="flex mb-1 ml-8 mr-8">
                                    <div class="w-24 bg-gray-200 h-12 text-center py-2"><span class="font-bold"></span></div>
                                    <div class="w-full bg-gray-200 h-12 text-center"><span class="font-bold">Descrição</span></div>
                                    <div class="w-24 bg-gray-200 h-12 text-center py-2"><span class="font-bold"></span></div>
                                    @if($admin)
                                    <div class="w-16 bg-gray-200 h-12 text-center py-2 mr-3"><span class="font-bold">Ação</span></div>
                                    @endif
                                </div>

                                @foreach($pessoafisica->atribuicoes as $atribuicao)

                                    <div class="flex mb-1 ml-8 mr-8">
                                        <div class="w-24 bg-gray-50 h-12 text-center py-2"><span class="font-bold"></span></div>
                                        <div class="w-full bg-gray-50 h-12 text-center py-2">{{$atribuicao->descricao_atribuicao ??  ''}}</div>
                                        <div class="w-24 bg-gray-50 h-12 text-center py-2"><span class="font-bold"></span></div>

                                        @if($admin)

                                            <div class="w-16 bg-gray-50 h-12 center py-2">
                                            <button x-data="registro()" x-on:click.prevent="deletarAtribuicao({{$titulo->id_atribuicao}})" class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            </div>
                                            <input type='hidden' x-data="registro()"  x-model="titulo.id_atribuicao" id="id_atribuicao" name="id_atribuicao" value="{{$atribuicao->id_atribuicao}}" />

                                        @endif
                                            </div>

                                @endforeach

                            @else
                                <div class="max-w-full rounded overflow-hidden shadow-lg mt-5">
                                    <div class="px-10 py-4 bg-gray-50">
                                        <div class="font-bold text-xl mb-2 text-alert-info"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Não há registro</div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">

        function profissional(pessoa){

            return {
                frmData: {
                    fk_id_pessoa: '{{ $pessoafisica->id }}',
                    nome: '{{ $pessoafisica->nome }}',
                    cpf: "{{ $pessoafisica->cpf }}",
                    identidade: '{{ $pessoafisica->identidade }}',
                    data_emissao_identidade: '{{ $pessoafisica->data_emissao_identidade }}',
                    data_nascimento: '{{ $pessoafisica->data_nascimento }}',
                    foto: '{{ $pessoafisica->foto }}',
                    pai: '{{ $pessoafisica->pai }}',
                    mae: '{{ $pessoafisica->mae }}',
                    sexo: '{{ $pessoafisica->sexo }}',
                    tipo_sangue: '{{ $pessoafisica->tipo_sangue }}',
                    fk_cd_nacionalidade: '{{ $pessoafisica->fk_cd_nacionalidade ?? "BRA" }}',
                    fk_id_naturalidade: '{{ $pessoafisica->fk_id_naturalidade }}',
                    deficiente: '{{ $pessoafisica->deficiente }}',
                    titulo_eleitor: '{{ $pessoafisica->titulo_eleitor }}',
                    zona_titulo_eleitor: '{{ $pessoafisica->zona_titulo_eleitor }}',
                    secao_titulo_eleitor: '{{ $pessoafisica->secao_titulo_eleitor }}',
                    observacao: `{{ $pessoafisica->observacao }}`,
                    email: '{{ $pessoafisica->email }}',
                    parentesco1: {
                                    id_parentesco: '{{ $pessoafisica->parentesco1->id_parentesco }}',
                                    nome: '{{ $pessoafisica->parentesco1->nome }}',
                                    fk_id_tipo_parentesco: '{{ $pessoafisica->parentesco1->fk_id_tipo_parentesco }}',
                                },
                    parentesco2: {
                                    id_parentesco: '{{ $pessoafisica->parentesco2->id_parentesco }}',
                                    nome: '{{ $pessoafisica->parentesco2->nome }}',
                                    fk_id_tipo_parentesco: '{{ $pessoafisica->parentesco2->fk_id_tipo_parentesco }}',
                                },
                    cidades: pessoa.data,

                },
                frmPessoa: null,
                salvarProfissional(){

                    this.frmData.cidades = [];
                    axios({
                        method: 'post',
                        url: '{{route('pessoafisica.update')}}',
                        data: this.frmData
                    });
                    this.frmData.cidades = pessoa.data;

                },
                listaCidade (uf) {
                    console.log( uf );
                    this.frmData.cidades = fetch('/endereco/cidade/uf/'+uf).then(response => response.json()).then(data => this.frmData.cidades = data);
                    console.log( this.frmData.cidades );
                },
            }

        }

        function endereco(){

            return {
                frmEnder: null,
                frmEndereco: {
                    empresa: {
                        id_endereco: '{{$pessoafisica->endereco->id_endereco}}',
                        cep: '{{$pessoafisica->endereco->cep}}',
                        fk_id_pessoa: '{{$pessoafisica->endereco->fk_id_pessoa}}',
                        logradouro: '{{$pessoafisica->endereco->logradouro}}',
                        numero: '{{$pessoafisica->endereco->numero}}',
                        estado: '{{$pessoafisica->endereco->estado}}',
                        cidade: '{{$pessoafisica->endereco->cidade}}',
                        bairro: '{{$pessoafisica->endereco->bairro}}',
                        complemento: '{{$pessoafisica->endereco->complemento}}',
                        fk_id_bairro: '{{$pessoafisica->endereco->fk_id_bairro}}',
                        fk_id_cidade: '{{$pessoafisica->endereco->fk_id_cidade}}',
                        fk_id_logradouro: '{{$pessoafisica->endereco->fk_id_logradouro}}',
                        fk_id_tipologradouro: '{{$pessoafisica->endereco->fk_id_tipologradouro}}',
                    },
                    st_correspondencia: true,
                    correspondencia: {
                        id_endereco: '{{$pessoafisica->correspondencia->id_endereco}}',
                        cep: '{{ $pessoafisica->correspondencia->cep }}',
                        fk_id_pessoa: '{{ $pessoafisica->endereco->fk_id_pessoa }}',
                        logradouro: '{{ $pessoafisica->correspondencia->logradouro }}',
                        numero: "{{ $pessoafisica->correspondencia->numero }}",
                        estado: '{{ $pessoafisica->correspondencia->estado }}',
                        cidade: '{{ $pessoafisica->correspondencia->cidade }}',
                        bairro: '{{ $pessoafisica->correspondencia->bairro }}',
                        complemento: '{{ $pessoafisica->correspondencia->complemento }}',
                        fk_id_bairro: '{{ $pessoafisica->correspondencia->fk_id_bairro }}',
                        fk_id_cidade: '{{ $pessoafisica->correspondencia->fk_id_cidade }}',
                        fk_id_logradouro: '{{ $pessoafisica->correspondencia->fk_id_logradouro }}',
                        fk_id_tipologradouro: '{{ $pessoafisica->correspondencia->fk_id_tipologradouro }}',
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
                titulo: {
                    fk_codigo_titulo_confea: '',
                    fk_id_registro_profissional: '',
                    instituicao_ensino: '',
                    data_conclusao_curso: '',
                    data_diploma: '',
                    fk_numero_processo: '',
                    principal: '',
                    titulos: [],
                },
                frmTituloProfissional: null,
                frmTitulo: null,
                salvarTituloProfissional(){
                    this.titulo.fk_codigo_titulo_confea = $('#selectTitulo').select2('data')[0].id;
                    axios(
                        {
                        method: 'post',
                        url: '{{route('titulo.salvar')}}',
                        data: this.titulo,
                        }
                    );
                },
                showModal: false,
                listaTitulo() {
                    console.log(uf);
                    this.titulo.titulos = fetch('/titulo/listatitulo').then(response => response.json()).then(data => this.titulo.titulos = data);
                    console.log(this.titulo.titulos);
                },
                deletarTitulo(idTitulo){

                    axios({
                        method: 'post',
                        url: '{{route('titulo.delete')}}',
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

        VMasker(document.getElementById("data_nascimento")).maskPattern('99/99/9999');
        VMasker(document.getElementById("data_emissao_identidade")).maskPattern('99/99/9999');
        VMasker(document.getElementById("cpf")).maskPattern('999.999.999-99');
        VMasker(document.getElementById("titulo_eleitor")).maskPattern('9999 9999 99 99');
        VMasker(document.getElementById("secao_titulo_eleitor")).maskPattern('9999');
        VMasker(document.getElementById("zona_titulo_eleitor")).maskPattern('9999');
        VMasker(document.getElementById("cep")).maskPattern('99.999-999');
        VMasker(document.getElementById("cepCorrespondencia")).maskPattern('99.999-999');
    </script>

</x-app-layout>
