<x-app-layout>
    <x-slot name="header">
        <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
            Cadastro Pessoa Física
        </h2>
    </x-slot>

    <div class='py-1'>

        <div x-data="{ tab: 'divDescricao' }" >

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
                        <form x-model='frmPessoa' id='frmPF' name='frmPF' method='POST' x-on:click.prevent="" x-data="profissional()">
                            @csrf
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                    CPF
                                </label>
                            <input x-model="frmData.cpf" id='cpf' name='cpf' type='text' placeholder='Insira o cpf' value=""
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome'>
                                    Nome
                                </label>
                                <input x-model="frmData.nome" id='nome' name='nome' type='text' placeholder='Insira o nome' value=""
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='identidade'>
                                    Identidade (RG)
                                </label>
                                <input x-model="frmData.identidade" id='identidade' name='identidade' type='text' placeholder='Insira o identidade'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_emissao_identidade'>
                                    Data de emissao do RG
                                </label>
                                <input x-model="frmData.data_emissao_identidade" id='data_emissao_identidade' name='data_emissao_identidade' type='text' placeholder='Insira a data de emissao do'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_nascimento'>
                                    Data nascimento
                                </label>
                                <input x-model="frmData.data_nascimento" id='data_nascimento' name='data_nascimento' type='text' placeholder='Insira o data_nascimento'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-44 md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_empresa'>
                                    Possui alguma deficência?
                                </label>
                                <select class='w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'
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
                                <select x-model="frmData.fk_cd_nacionalidade" name="fk_cd_nacionalidade" id="fk_cd_nacionalidade" placeholder='Insira sua nacionalidade'
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
                                    <select name="fk_id_uf" id="fk_id_uf" placeholder='Selecione a UF' @change="listaCidade( this.fk_id_uf.value )"
                                            class='flex-auto w-16 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 mr-3 leading-tight focus:outline-none focus:bg-white'>
                                        <option value="XX">Selecione</option>
                                        @foreach ($pessoafisica->listaUf as $uf)
                                            <option value="{{ $uf->pk_uf }}"
                                            @if ($uf->pk_uf == $pessoafisica->pk_uf)
                                                selected
                                            @endif >{{ $uf->descricao_uf }}</option>
                                        @endforeach
                                    </select>

                                    <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                        <select x-model="selectedCidade" class='flex-auto w-full block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'
                                            name="fk_id_naturalidade" id="fk_id_naturalidade" >
                                            <template x-for="cidade in cidades" :key="cidade.pk_cidade">
                                                <option :value="cidade.pk_cidade" x-text="cidade.nome_cidade"></option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='foto'>
                                    Foto
                                </label>
                                <input x-model="frmData.foto" id='foto' name='foto' type='text' placeholder='Insira o foto' value="{{ $pessoafisica->fk_cd_nacionalidde }}"
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='mae'>
                                    Nome da mae
                                </label>
                                <input x-model="frmData.mae" id='mae' name='mae' type='text' placeholder='Insira o nome da mãe'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='pai'>
                                    Nome do pai
                                </label>
                                <input x-model="frmData.pai" id='pai' name='pai' type='text' placeholder='Insira o pai'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_empresa'>
                                    Sexo
                                </label>
                                <select x-model="frmData.sexo" name="sexo" id="sexo" class='w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <option value="0">Selecione</option>
                                    <option value="1" @if($pessoafisica->sexo == '1') selected @endif>Masculino</option>
                                    <option value="2" @if($pessoafisica->sexo == '2') selected @endif>Feminino</option>
                                </select>
                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_sangue'>
                                    tipo sanguíneo
                                </label>
                                <input x-model="frmData.tipo_sangue" id='tipo_sangue' name='tipo_sangue' type='text' placeholder='Insira o tipo sanguíneo' value="{{ $pessoafisica->tipo_sangue }}"
                                    class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex w-full md:w-1/2 md:mb-0'>
                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='titulo_eleitor'>
                                        título eleitor
                                    </label>
                                    <input x-model="frmData.titulo_eleitor" id='titulo_eleitor' name='titulo_eleitor' type='text' placeholder='Insira o titulo_eleitor'
                                        class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='zona_titulo_eleitor'>
                                        zona título eleitor
                                    </label>
                                    <input x-model="frmData.zona_titulo_eleitor" id='zona_titulo_eleitor' name='zona_titulo_eleitor' type='text' placeholder='Insira o zona_titulo_eleitor'
                                        class='appearance-none block w-28 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='secao_titulo_eleitor'>
                                        Seção título eleitor
                                    </label>
                                    <input x-model="frmData.secao_titulo_eleitor" id='secao_titulo_eleitor' name='secao_titulo_eleitor' type='text' placeholder='Insira o secao_titulo_eleitor'
                                        class='appearance-none block w-28 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='observacao'>
                                    Observação
                                </label>

                                <textarea x-model="frmData.observacao" id='observacao' name='observacao'  placeholder='Insira as observações' value="{{ $pessoafisica->observacao }}" class='appearance-none block w-full h-32 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white resize border rounded focus:outline-none focus:shadow-outline'></textarea>
                            </div>

                            <input id='field' name='field' type='hidden' value="eyJpdiI6Im5BTDRPVjBVcUl1Z2Y1S1ZMMkE5aGc9PSIsInZhbHVlIjoiOFJJMDIwN0NxbGZ4dmpnOUxUQzNnQT09IiwibWFjIjoiNWM0MmIyOTE4YjM2NWZlOThhY2Q2MjM4MWU0MGIzZmFhNzg5ZTllMGZiMzJmM2YxNTIyNWEwMmY3ZjllMGVlNSJ9"/>


                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <button type='button' x-on:click.prevent="salvarProfissional()" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-8 center'>
                                    Salvar
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

            <!-- Aba de cadastro de contato e endereço -->

            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="divContato" ref="divContato" x-show="tab === 'divContato'">

                <div class='bg-white py-3 overflow-hidden shadow-xl sm:rounded-lg'>

                    <form x-model='formEndereco' id='formEndereco' name='formEndereco' method='POST' x-on:click.prevent="" x-data="endereco()">
                        <div class='row col-md-6 py-3'>



                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/5 mb-4 h-12 mr-5">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cep'>
                                        CEP
                                    </label>
                                    <input value={{ $pessoafisica->endereco->cep }} id='cep' name='cep' type='text' placeholder='Insira o cep'
                                        class='appearance-none inline w-44 bg-gray-50 text-center text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <button id="busca" x-on:click.prevent="getEnderecoCep()" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-full h-9 w-9">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                                    <div class="w-1/3 mb-4 h-12">
                                        <label class='w-full block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='logradouro'>
                                        Logradouro
                                    </label>
                                    <input value="{{ $pessoafisica->endereco->endereco }}" id='logradouro' name='logradouro' type='text' placeholder='Insira o logradouro'
                                        class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 mb-4 h-12 ml-5">
                                    <label class='w-20 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='numero'>
                                        Nº
                                    </label>
                                    <input value="{{ $pessoafisica->endereco->numero }}" id='numero' name='numero' type='text' placeholder='Insira o número'
                                        class='appearance-none block w-16 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                            </div>
                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/6 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='estado'>
                                    Estado
                                </label>
                                <input value="{{ $pessoafisica->endereco->estado }}" id='estado' name='estado' type='text' placeholder='Insira a UF'
                                    class='appearance-none w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cidade'>
                                        Cidade
                                    </label>
                                    <input value="{{ $pessoafisica->endereco->cidade }}" id='cidade' name='cidade' type='text' placeholder='Escolha a cidade'
                                        class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/4 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='bairro'>
                                        Bairro
                                    </label>
                                    <input value="{{ $pessoafisica->endereco->bairro }}" id='bairro' name='bairro' type='text' placeholder='Insira o bairro'
                                        class='appearance-none w-full block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                            </div>

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/4 mb-4 h-12">
                                   <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='complemento'>
                                    Complemento
                                </label>
                                <input value="{{ $pessoafisica->endereco->complemento }}" id='complemento' name='complemento' type='text' placeholder='Insira o complemento'
                                    class='appearance-none w-full block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                            <div class=" flex w-65 mt-7 mb-10" @click="marcarBox()">
                                <label class="switch w-65">
                                    <input type="checkbox" x-model="frmEndereco.empresa.st_correspondencia" :value="st_correspondencia" id="st_correspondencia" name="st_correspondencia" checked />
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
                            <input id='field' name='field' type='hidden' value="{{ $pessoafisica->id_pessoa }}"/>
                        </div>


                        <div class='row col-md-6 ml-3' style="display: none;" id="dvCorrespondencia" name="dvCorrespondencia">

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/5 mb-4 h-12 mr-5">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cep'>
                                        CEP
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.cep" id='cep' name='cep' type='text' placeholder='Insira o cep'
                                        class='appearance-none inline w-44 bg-gray-50 text-center text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <button id="busca" x-on:click.prevent="getEnderecoCep(this.cep.value)" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-full h-9 w-9">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                                    <div class="w-1/3 mb-4 h-12">
                                        <label class='w-full block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='logradouro'>
                                        Logradouro
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.logradouro" id='logradouro' name='logradouro' type='text' placeholder='Insira o logradouro'
                                        class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 mb-4 h-12 ml-5">
                                    <label class='w-20 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='numero'>
                                        Nº
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.numero" id='numero' name='numero' type='text' placeholder='Insira o número'
                                        class='appearance-none block w-16 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                            </div>
                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/6 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='estado'>
                                    Estado
                                </label>
                                <input x-model="frmEndereco.correspondencia.estado" id='estado' name='estado' type='text' placeholder='Insira a UF'
                                    class='appearance-none w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/6 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cidade'>
                                        Cidade
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.cidade" id='cidade' name='cidade' type='text' placeholder='Escolha a cidade'
                                        class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                                <div class="w-1/4 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='bairro'>
                                        Bairro
                                    </label>
                                    <input x-model="frmEndereco.correspondencia.bairro" id='bairro' name='bairro' type='text' placeholder='Insira o bairro'
                                        class='appearance-none w-full block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                            </div>

                            <div class="flex flex-wrap mt-5 row">
                                <div class="w-1/4 mb-4 h-12">
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='complemento'>
                                    Complemento
                                </label>
                                <input x-model="frmEndereco.correspondencia.complemento" id='complemento' name='complemento' type='text' placeholder='Insira o complemento'
                                    class='appearance-none w-full block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>

                            </div>

                            <input x-model="frmEndereco.correspondencia.id_endereco2" id='id_endereco2' name='id_endereco2' type='hidden' />

                            <input x-model="frmEndereco.correspondencia.fk_id_bairro" id='fk_id_bairro' name='fk_id_bairro' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_cidade" id='fk_id_cidade' name='fk_id_cidade' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_logradouro" id='fk_id_logradouro' name='fk_id_logradouro' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.fk_id_tipologradouro" id='fk_id_tipologradouro' name='fk_id_tipologradouro' type='hidden' />
                            <input x-model="frmEndereco.correspondencia.cidade" id='field' name='field' type='hidden' value="{{ $pessoafisica->id_pessoa }}"/>

                        </div>
                        <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                            <button type='button' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-12 center'>
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="divRegistro" ref="divRegistro" x-show="tab === 'divRegistro'">

                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>

                        <form action='' id='frm-pessoa-endereco' name='frm-pessoa-endereco' method='POST' x-on:click.prevent="">

                            <div class='w-full flex md:w-1/2 md:mb-0'>
                                <div class='flex-auto md:w-full px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='rnp'>
                                        RNP
                                    </label>
                                    <input id='rnp' name='rnp' type='text' placeholder='Insira o RNP'
                                        class='w-half-width appearance-none block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='registro'>
                                        Registro
                                    </label>
                                    <input id='registro' name='registro' type='text' placeholder='Insira o registro'
                                        class='appearance-none inline w-half-width bg-gray-50 text-center text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                </div>
                            </div>

                            <div class="max-w-full rounded overflow-hidden shadow-lg mt-5">

                                <div class="px-10 py-4">
                                    <div class="font-bold text-xl mb-2">Quadro Técnico</div>
                                    <p class="text-gray-700 text-base">

                                    </p>
                                </div>

                                <div class="flex mb-2">
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Empresa</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Início</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Validade</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Baixa</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Ação</span></div>
                                </div>

                                <div class="flex mb-1">
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">teste LTDA</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">20/10/2018</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">20/05/2019</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">15/07/2019</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">
                                        <button class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="ml-4 bg-transparent hover:bg-blue-500 text-yellow-500 font-bold hover:text-white border border-yellow-300 hover:border-transparent rounded">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex mb-1">
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">Empresa de obras LTDA</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">20/10/2020</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">20/05/2021</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">-</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">
                                        <button title="excluir item" class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="ml-4 bg-transparent hover:bg-blue-500 text-yellow-500 font-bold hover:text-white border border-yellow-300 hover:border-transparent rounded">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex mb-1">
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">Eletrotécnica S/A</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">20/08/2017</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">20/05/2023</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">-</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">
                                        <button class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="ml-4 bg-transparent hover:bg-blue-500 text-yellow-500 font-bold hover:text-white border border-yellow-300 hover:border-transparent rounded">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                </div>


                            </div>

                            <div class="max-w-full rounded overflow-hidden shadow-lg mt-5">

                                <div class="px-10 py-4">
                                    <div class="font-bold text-xl mb-2">Títulos</div>
                                    <p class="text-gray-700 text-base">

                                    </p>
                                </div>

                                <div class="flex mb-2">
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Título</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Conslusão</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Diploma</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Instituição</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Processo</span></div>
                                    <div class="w-1/6 bg-gray-200 h-12 text-center py-2"><span class="font-bold">Ação</span></div>
                                </div>

                                <div class="flex mb-1">
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">Engenheiro agrônomo</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">20/10/2018</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">20/05/2019</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">15/07/2019</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">45646/2016</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">
                                        <button class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="ml-4 bg-transparent hover:bg-blue-500 text-yellow-500 font-bold hover:text-white border border-yellow-300 hover:border-transparent rounded">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex mb-1">
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">Empresa de obras LTDA</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">20/10/2020</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">20/05/2021</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">15/08/2021</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">56151/2019</div>
                                    <div class="w-1/6 bg-gray-100 h-12 text-center py-3">
                                        <button class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="ml-4 bg-transparent hover:bg-blue-500 text-yellow-500 font-bold hover:text-white border border-yellow-300 hover:border-transparent rounded">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex mb-1">
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">Eletrotécnica S/A</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">20/08/2017</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">20/05/2023</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">14/11/2015</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">884454/2019</div>
                                    <div class="w-1/6 bg-gray-50 h-12 text-center py-3">
                                        <button class="bg-transparent hover:bg-blue-500 text-red-700 font-bold hover:text-white border border-red-500 hover:border-transparent rounded">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="ml-4 bg-transparent hover:bg-blue-500 text-yellow-500 font-bold hover:text-white border border-yellow-300 hover:border-transparent rounded">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                </div>


                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">

        function profissional(){

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
                    fk_cd_nacionalidade: '{{ $pessoafisica->fk_cd_nacionalidade }}',
                    fk_id_naturalidade: '{{ $pessoafisica->fk_id_naturalidade }}',
                    deficiente: '{{ $pessoafisica->deficiente }}',
                    titulo_eleitor: '{{ $pessoafisica->titulo_eleitor }}',
                    zona_titulo_eleitor: '{{ $pessoafisica->zona_titulo_eleitor }}',
                    secao_titulo_eleitor: '{{ $pessoafisica->secao_titulo_eleitor }}',
                    observacao: `{{ $pessoafisica->observacao }}`,
                },
                frmPessoa: null,
                salvarProfissional(){

                    axios({
                        method: 'post',
                        url: '{{route('pessoafisica.update')}}',
                        data: this.frmData
                    });

                },
                selectedCidade: '',
                cidades: [{'pk_cidade': 0, 'nome_cidade': 'Escolha uma UF'}],
                listaCidade (uf) {
                    this.cidades = fetch('/endereco/cidade/uf/'+uf).then(response => response.json()).then(data => cidades = data);
                    this.selectedCidade = fetch('/endereco/cidade/uf/'+uf).then(response => response.json()).then(data => this.cidades = data);
                },
            }

        }

        function endereco(){

            return {
                frmEndereco: {
                    empresa: {
                        cep: '',
                        fk_id_pessoa: '',
                        logradouro: '',
                        numero: '',
                        estado: '',
                        cidade: '',
                        bairro: '',
                        complemento: '',
                        fk_id_bairro: '',
                        fk_id_cidade: '',
                        fk_id_logradouro: '',
                        fk_id_tipologradouro: '',
                        st_correspondencia: true,
                    },
                    correspondencia: {
                        cep: '{{ $pessoafisica->endereco->cep }}',
                        fk_id_pessoa: '{{ $pessoafisica->endereco->fk_id_pessoa }}',
                        logradouro: '{{ $pessoafisica->endereco->endereco }}',
                        numero: "{{ $pessoafisica->endereco->numero }}",
                        estado: '{{ $pessoafisica->endereco->estado }}',
                        cidade: '{{ $pessoafisica->endereco->cidade }}',
                        bairro: '{{ $pessoafisica->endereco->bairro }}',
                        complemento: '{{ $pessoafisica->endereco->complemento }}',
                        fk_id_bairro: '{{ $pessoafisica->endereco->fk_id_bairro }}',
                        fk_id_cidade: '{{ $pessoafisica->endereco->fk_id_cidade }}',
                        fk_id_logradouro: '{{ $pessoafisica->endereco->fk_id_logradouro }}',
                        fk_id_tipologradouro: '{{ $pessoafisica->endereco->fk_id_tipologradouro }}',
                    }


                },
                empresa: null,
                correspondencia: null,
                marcarBox(){
                    this.frmEndereco.empresa.st_correspondencia = !this.frmEndereco.empresa.st_correspondencia;

                    if(this.frmEndereco.empresa.st_correspondencia){
                        document.getElementById('dvCorrespondencia').style.display = 'none';
                    }else{
                        document.getElementById('dvCorrespondencia').style.display = 'block';
                    }

                },
                salvarEndereco(){

                    // axios({
                    //     method: 'post',
                    //     url: '{{route('pessoafisica.update')}}',
                    //     data: this.frmData
                    // });

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

                    } );

                }
            }

        }

        VMasker(document.getElementById("data_nascimento")).maskPattern('99/99/9999');
        VMasker(document.getElementById("data_emissao_identidade")).maskPattern('99/99/9999');
        VMasker(document.getElementById("cpf")).maskPattern('999.999.999-99');
        VMasker(document.getElementById("titulo_eleitor")).maskPattern('9999 9999 9999');
        VMasker(document.getElementById("secao_titulo_eleitor")).maskPattern('9999');
        VMasker(document.getElementById("zona_titulo_eleitor")).maskPattern('9999');
        VMasker(document.getElementById("cep")).maskPattern('99.999-999');

    </script>

</x-app-layout>
