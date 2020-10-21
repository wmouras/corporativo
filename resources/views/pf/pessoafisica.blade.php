<x-app-layout>
    <x-slot name="header">
        <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
            Cadastro Pessoa Física
        </h2>
    </x-slot>

        <div class='py-1'>

            <div x-data="{ tab: 'divDescricao' }" >

                <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
                    <button :class="{ 'active': tab === 'divDescricao' }" class="inline w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-36 mb-1 leading-tight focus:outline-none focus:bg-white" @click="tab = 'divDescricao'">
                        Descrição
                    </button>
                    <button :class="{ 'active': tab === 'divContato' }" class="inline w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-36 mb-1 leading-tight focus:outline-none focus:bg-white" @click="tab = 'divContato'">
                        Contato
                    </button>
                    <button :class="{ 'active': tab === 'divContato' }" class="inline w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-36 mb-1 leading-tight focus:outline-none focus:bg-white" @click="tab = 'divContato'">
                        Quadro Técnico
                    </button>
                </div>


            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="divDescricao" ref="divDescricao" x-show="tab === 'divDescricao'">
                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>
                        <form action='' id='frmPessoaFisica' name='frmPessoaFisica' method='POST' x-on:click.prevent="" x-data="profissional()">

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                    CPF
                                </label>
                                <input id='cpf' name='cpf' type='text' placeholder='Insira o cpf' value="{{ $pessoafisica->cpf }}"
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome'>
                                    Nome
                                </label>
                                <input id='nome' name='nome' type='text' placeholder='Insira o nome' value="{{ $pessoafisica->nome }}"
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='identidade'>
                                    Identidade (RG)
                                </label>
                                <input id='identidade' name='identidade' type='text' placeholder='Insira o identidade'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_emissao_identidade'>
                                    Data de emissao do RG
                                </label>
                                <input id='data_emissao_identidade' name='data_emissao_identidade' type='text' placeholder='Insira a data de emissao do'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_nascimento'>
                                    Data nascimento
                                </label>
                                <input id='data_nascimento' name='data_nascimento' type='text' placeholder='Insira o data_nascimento'
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
                                <select name="fk_cd_nacionalidade" id="fk_cd_nacionalidade" placeholder='Insira sua nacionalidade'
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

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'
                                    x-data="alpineInstance()"
                                    x-init=""
                                >
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
                                <input id='foto' name='foto' type='text' placeholder='Insira o foto' value="{{ $pessoafisica->fk_cd_nacionalidde }}"
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='mae'>
                                    Nome da mae
                                </label>
                                <input id='mae' name='mae' type='text' placeholder='Insira o nome da mãe'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='pai'>
                                    Nome do pai
                                </label>
                                <input id='pai' name='pai' type='text' placeholder='Insira o pai'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_empresa'>
                                    Sexo
                                </label>
                                <select name="sexo" id="sexo" class='w-44 block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                    <option value="0">Selecione</option>
                                    <option value="1" @if($pessoafisica->sexo == '1') selected @endif>Masculino</option>
                                    <option value="2" @if($pessoafisica->sexo == '2') selected @endif>Feminino</option>
                                </select>
                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_sangue'>
                                    tipo sanguíneo
                                </label>
                                <input id='tipo_sangue' name='tipo_sangue' type='text' placeholder='Insira o tipo sanguíneo' value="{{ $pessoafisica->tipo_sangue }}"
                                    class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex w-full md:w-1/2 md:mb-0'>
                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='titulo_eleitor'>
                                        título eleitor
                                    </label>
                                    <input id='titulo_eleitor' name='titulo_eleitor' type='text' placeholder='Insira o titulo_eleitor'
                                        class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='zona_titulo_eleitor'>
                                        zona título eleitor
                                    </label>
                                    <input id='zona_titulo_eleitor' name='zona_titulo_eleitor' type='text' placeholder='Insira o zona_titulo_eleitor'
                                        class='appearance-none block w-28 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                                <div class='flex-auto w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='secao_titulo_eleitor'>
                                        Seção título eleitor
                                    </label>
                                    <input id='secao_titulo_eleitor' name='secao_titulo_eleitor' type='text' placeholder='Insira o secao_titulo_eleitor'
                                        class='appearance-none block w-28 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>
                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='observacao'>
                                    Observação
                                </label>

                                <textarea id='observacao' name='observacao'  placeholder='Insira as observações' value="{{ $pessoafisica->observacao }}" class='appearance-none block w-full h-32 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white resize border rounded focus:outline-none focus:shadow-outline'></textarea>
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

                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>

                        <form action='' id='frm-pessoa-endereco' name='frm-pessoa-endereco' method='GET' x-on:click.prevent="">

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='endereco_valido'>
                                    Endereco Principal (correspondência)
                                </label>
                                <input id='endereco_valido' name='endereco_valido' type='checkbox'
                                    class='appearance-none block w-14 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='flex w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <div class='flex-auto'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cep'>
                                        CEP
                                    </label>
                                    <input id='cep' name='cep' type='text' placeholder='Insira o cep'
                                        class='appearance-none inline w-44 bg-gray-50 text-center text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                    &nbsp;&nbsp;&nbsp;
                                    <button id="busca" x-on:click.prevent="getEnderecoCep(this.cep.value)" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded-full h-9 w-9">
                                        <i class="fa fa-check"></i>
                                    </button>

                                </div>
                            </div>

                            <div class='w-full flex md:w-1/2 md:mb-0'>
                            <div class='flex-auto md:w-full px-3 mb-6 md:mb-0'>
                                <label class='w-full block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='logradouro'>
                                    Logradouro
                                </label>
                                <input id='logradouro' name='logradouro' type='text' placeholder='Insira o logradouro'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex-auto md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='w-20 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='numero'>
                                    Número
                                </label>
                                <input id='numero' name='numero' type='text' placeholder='Insira o número'
                                    class='appearance-none block w-24 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            </div>

                            <div class='w-full md:w-1/3 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='complemento'>
                                    Complemento
                                </label>
                                <input id='complemento' name='complemento' type='text' placeholder='Insira o complemento'
                                    class='appearance-none w-full block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full flex md:w-1/3 md:mb-0'>
                            <div class='flex-auto md:w-1/6 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='estado'>
                                    Estado
                                 </label>
                                <input id='estado' name='estado' type='text' placeholder='Insira o complemento'
                                    class='appearance-none w-full block bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='flex-auto md:w-1/3 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cidade'>
                                    Cidade
                                </label>
                                <input id='cidade' name='cidade' type='text' placeholder='Escolha a cidade'
                                    class='appearance-none block w-44 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            </div>

                            <div class='w-full md:w-1/3 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='bairro'>
                                    Bairro
                                </label>
                                <input id='bairro' name='bairro' type='text' placeholder='Insira o bairro'
                                    class='appearance-none w-full block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-12 center'>
                                    Salvar
                                </button>
                            </div>

                            <input id='usuario_atualizacao' name='usuario_atualizacao' type='hidden' />
                            <input id='id_endereco' name='id_endereco' type='hidden' />

                            <input id='fk_id_bairro' name='fk_id_bairro' type='hidden' />
                            <input id='fk_id_cidade' name='fk_id_cidade' type='hidden' />
                            <input id='fk_id_logradouro' name='fk_id_logradouro' type='hidden' />
                            <input id='fk_id_tipologradouro' name='fk_id_tipologradouro' type='hidden' />
                            <input id='field' name='field' type='hidden' value="{{ $pessoafisica->id_pessoa }}"/>

                        </form>

                    </div>


                </div>

            </div>
                <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' stye="display: none;" id="div_3" ref="divQuadro">
                </div>
            </div>
        </div>
    </x-app-layout>

    <script type="text/javascript">

        VMasker(document.getElementById("data_nascimento")).maskPattern('99/99/9999');
        VMasker(document.getElementById("data_emissao_identidade")).maskPattern('99/99/9999');
        VMasker(document.getElementById("cpf")).maskPattern('999.999.999-99');
        VMasker(document.getElementById("titulo_eleitor")).maskPattern('9999 9999 9999');
        VMasker(document.getElementById("secao_titulo_eleitor")).maskPattern('9999');
        VMasker(document.getElementById("zona_titulo_eleitor")).maskPattern('9999');
        VMasker(document.getElementById("cep")).maskPattern('99.999-999');

        function alpineInstance() {
            return {
                selectedCidade: '',
                cidades: [{'pk_cidade': 0, 'nome_cidade': 'Escolha uma UF'}],
                listaCidade (uf) {
                    this.cidades = fetch('/endereco/cidade/uf/'+uf).then(response => response.json()).then(data => cidades = data);
                    this.selectedCidade = fetch('/endereco/cidade/uf/'+uf).then(response => response.json()).then(data => this.cidades = data);
                },
            };
        }

        function profissional(){
            return {
                dataForm: {
                    fk_id_pessoa: this.field.value,
                    nome: this.nome.value,
                    cpf: this.cpf.value,
                    identidade: this.identidade.value,
                    data_emissao_identidade: this.data_emissao_identidade.value,
                    data_nascimento: this.data_nascimento.value,
                    foto: this.foto.value,
                    pai: this.pai.value,
                    mae: this.mae.value,
                    sexo: this.sexo.value,
                    tipo_sangue: this.tipo_sangue.value,
                    fk_cd_nacionalidade: this.fk_cd_nacionalidade.value,
                    fk_id_naturalidade: this.fk_id_naturalidade.value,
                    deficiente: this.id_deficiencia.value,
                    titulo_eleitor: this.titulo_eleitor.value,
                    zona_titulo_eleitor: this.zona_titulo_eleitor.value,
                    secao_titulo_eleitor: this.secao_titulo_eleitor.value,
                    // fk_cidade_titulo_eleitor: this.fk_cidade_titulo_eleitor.value,
                    observacao: this.observacao.value,
                },
                salvarProfissional(){

                    console.log( this.frmPessoaFisica );

                    fetch('/pf/pessoafisica/salva/',{
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        data: this.dataForm
                    })
                    .then(res => res.json())
                    .catch(() => {
                        this.message = 'Ooops! Algo deu errado!'
                    })

                }
            }
        }

        function getEnderecoCep(cep){
            endereco = fetch( '/endereco/cep/'+cep ).then( res => res.json() )
            .then( data => {
                endereco = data;
                this.logradouro.value = endereco.logradouro;
                this.bairro.value = endereco.bairro;
                this.cidade.value = endereco.cidade;
                this.estado.value = endereco.estado;
                this.fk_id_bairro.value = endereco.fk_id_bairro;
                this.fk_id_cidade.value = endereco.fk_id_cidade;
                this.fk_id_logradouro.value = endereco.fk_id_logradouro;
                this.fk_id_tipologradouro.value = endereco.fk_id_tipologradouro;

                console.log(endereco);

            } );

        }

    </script>

