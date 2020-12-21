<x-app-layout>
    <x-slot name="header">
        <h2 class='text-xl font-semibold leading-tight text-gray-800'>
            Cadastro Pessoa Jurica
        </h2>
    </x-slot>

        <div class='py-1'>

            <div x-data="{ tab: 'divDescricao' }" >

                <div class='mx-auto max-w-7xl sm:px-6 lg:px-8'>
                    <button :class="{ 'active': tab === 'divDescricao' }" class="inline py-3 mb-1 leading-tight text-gray-700 border rounded w-65 bg-gray-50 border-blue-50 px-36 focus:outline-none focus:bg-white" @click="tab = 'divDescricao'">
                        Descrição
                    </button>
                    <button :class="{ 'active': tab === 'divContato' }" class="inline py-3 mb-1 leading-tight text-gray-700 border rounded w-65 bg-gray-50 border-blue-50 px-36 focus:outline-none focus:bg-white" @click="tab = 'divContato'">
                        Contato
                    </button>
                    <button :class="{ 'active': tab === 'divContato' }" class="inline py-3 mb-1 leading-tight text-gray-700 border rounded w-65 bg-gray-50 border-blue-50 px-36 focus:outline-none focus:bg-white" @click="tab = 'divContato'">
                        Quadro Técnico
                    </button>
                </div>


            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="divDescricao" ref="divDescricao" x-show="tab === 'divDescricao'">
                <div class='overflow-hidden bg-white shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>
                        <form action='/pessoajuridica/salvar' id='frm-pessoa-fisica' name='frm-pessoa-fisica' method='GET'>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cpf'>
                                    CPF
                                </label>
                                <input id='cpf' name='cpf' type='text' placeholder='Insira o cpf' value="{{ $pessoajuridica->cpf }}"
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='nome'>
                                    Nome
                                </label>
                                <input id='nome' name='nome' type='text' placeholder='Insira o nome' value="{{ $pessoajuridica->nome }}"
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='identidade'>
                                    Identidade (RG)
                                </label>
                                <input id='identidade' name='identidade' type='text' placeholder='Insira o identidade'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_emissao_identidade'>
                                    Data de emissao da RG
                                </label>
                                <input id='data_emissao_identidade' name='data_emissao_identidade' type='text' placeholder='Insira o data_emissao_identidade'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='data_nascimento'>
                                    Data nascimento
                                </label>
                                <input id='data_nascimento' name='data_nascimento' type='text' placeholder='Insira o data_nascimento'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='tipo_empresa'>
                                    Deficiente?
                                </label>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='tipo_empresa'>
                                    Nacionalidade
                                </label>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_id_naturalidade'>
                                    Naturalidade
                                </label>
                                <input id='fk_id_naturalidade' name='fk_id_naturalidade' type='text' placeholder='Insira o fk_id_naturalidade'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='foto'>
                                    Foto
                                </label>
                                <input id='foto' name='foto' type='text' placeholder='Insira o foto'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='mae'>
                                    Nome da mae
                                </label>
                                <input id='mae' name='mae' type='text' placeholder='Insira o nome da mãe'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='pai'>
                                    Nome do pai
                                </label>
                                <input id='pai' name='pai' type='text' placeholder='Insira o pai'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='tipo_empresa'>
                                    Sexo
                                </label>
                                <select name="sexo" id="sexo" class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                    <option value="0">Selecione</option>
                                    <option value="1" @if($pessoajuridica->sexo == '1') selected @endif>Masculino</option>
                                    <option value="2" @if($pessoajuridica->sexo == '2') selected @endif>Feminino</option>
                                </select>
                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='tipo_sangue'>
                                    tipo sanguíneo
                                </label>
                                <input id='tipo_sangue' name='tipo_sangue' type='text' placeholder='Insira o tipo sanguíneo' value="{{ $pessoajuridica->tipo_sangue }}"
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex w-full md:w-1/2 md:mb-0'>
                                <div class='flex-auto w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='titulo_eleitor'>
                                        título eleitor
                                    </label>
                                    <input id='titulo_eleitor' name='titulo_eleitor' type='text' placeholder='Insira o titulo_eleitor'
                                        class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='zona_titulo_eleitor'>
                                        zona título eleitor
                                    </label>
                                    <input id='zona_titulo_eleitor' name='zona_titulo_eleitor' type='text' placeholder='Insira o zona_titulo_eleitor'
                                        class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-28 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                    <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='secao_titulo_eleitor'>
                                        Seção título eleitor
                                    </label>
                                    <input id='secao_titulo_eleitor' name='secao_titulo_eleitor' type='text' placeholder='Insira o secao_titulo_eleitor'
                                        class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-28 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                                </div>
                            </div>
                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='observacao'>
                                    Observação
                                </label>

                                <textarea id='observacao' name='observacao'  placeholder='Insira as observações' value="{{ $pessoajuridica->observacao }}" class='block w-full h-32 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none resize bg-gray-50 border-blue-50 focus:outline-none focus:bg-white focus:shadow-outline'></textarea>
                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <button type='submit' class='px-4 py-2 mt-8 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 center'>
                                    Salvar
                                </button>
                            </div>

                        </form>

                    </div>


                </div>
            </div>

            <!-- Aba de cadastro de contato e endereço -->

            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="divContato" ref="divContato" x-show="tab === 'divContato'">

                <div class='overflow-hidden bg-white shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>

                        <form action='/pessoajuridica/endereco' id='frm-pessoa-endereco' name='frm-pessoa-endereco' method='GET'>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='endereco_valido'>
                                    Endereco Principal (correspondência)
                                </label>
                                <input id='endereco_valido' name='endereco_valido' type='checkbox'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-14 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>
                            <div class='flex w-full px-3 mb-6 md:w-1/3 md:mb-0'>
                            <div class='flex-auto px-3 mb-6 md:w-1/3 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cep'>
                                    CEP
                                </label>
                                <input id='cep' name='cep' type='text' placeholder='Insira o cep' v-mask="'##.###-###'"
                                    class='block px-4 py-3 mb-3 leading-tight text-center text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                             </div>
                             <div class='flex-auto px-0 py-3 mb-1 md:w-0 md:mb-0 left'>
                             <label class='block text-xs font-bold tracking-wide text-gray-700 uppercase ' for='search'>
                                    &nbsp;
                                </label>
                                <button id="search" @click="getEnderecoCep()" class="px-1 py-1 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 h-9 w-9">
                                    <i class="fa fa-redo"></i>
                                </button>

                            </div>
                            </div>

                            <div class='flex w-full md:w-1/2 md:mb-0'>
                            <div class='flex-auto px-3 mb-6 md:w-full md:mb-0'>
                                <label class='block w-full mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='endereco'>
                                    Logradouro
                                </label>
                                <input id='endereco' name='endereco' type='text' placeholder='Insira o logradouro'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex-auto px-3 mb-6 md:w-1/2 md:mb-0'>
                                <label class='block w-20 mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='numero'>
                                    Número
                                </label>
                                <input id='numero' name='numero' type='text' placeholder='Insira o número' v-mask="'######'"
                                    class='block w-24 px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>
                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/3 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='complemento'>
                                    Complemento
                                </label>
                                <input id='complemento' name='complemento' type='text' placeholder='Insira o complemento'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex w-full md:w-1/3 md:mb-0'>
                            <div class='flex-auto px-3 mb-6 md:w-1/6 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='id_uf'>
                                    Estado
                                 </label>
                                <input id='complemento' name='complemento' type='text' placeholder='Insira o complemento'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex-auto md:w-1/3 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='fk_id_cidade'>
                                    Cidade
                                </label>
                                <input id='fk_id_cidade' name='fk_id_cidade' type='text' placeholder='Escolha a cidade'
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-44 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>
                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/3 md:mb-0'>
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='bairro'>
                                    Bairro
                                </label>
                                <input id='bairro' name='bairro' type='text' placeholder='Insira o bairro'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                                <button type='submit' class='px-4 py-2 mt-12 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 center'>
                                    Salvar
                                </button>
                            </div>

                            <input id='usuario_atualizacao' name='usuario_atualizacao' type='hidden' />
                            <input id='id_endereco' name='id_endereco' type='hidden' />

                        </form>

                    </div>


                </div>

            </div>
                <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' stye="display: none;" id="div_3" ref="divQuadro">
                </div>
            </div>
        </div>
    </x-app-layout>

    @livewireScripts


