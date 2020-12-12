<x-app-layout>
    <x-slot name="header">
        <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
            Pessoa Física
        </h2>
    </x-slot>

        <div class='py-3 px-3'>
            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <form id="frmPesquisaProfissional" name="frmPesquisaProfissional" action="" x-on:click.prevent="" method="POST">

                        <div class='row col-md-6 flex inline px-3'>

                            <div class="w-1/8 h-12 text-left py-3">
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='codigo_registro'>
                                    Registro:
                                </label>

                                <input id='codigo_registro' name='codigo_registro' type='text' placeholder='Insira o registro' @keyup.enter="$event.target.nextElementSibling.focus()"
                                    class='appearance-none block w-28 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                            </div>
                            <div class="w-1/4 h-12 text-left py-3 pl-5">
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome'>
                                    Nome:
                                </label>
                                <input id='nome_fantasia' name='nome' type='text' placeholder='Insira o nome'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                            </div>
                            <div class="w-1/6 h-12 text-left py-3 pl-5">
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                    CPF:
                                </label>
                                <input name='cpf' id='cpf' type='text' placeholder='Apenas números' v-mask="'##.###.###/####-##'"
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                            </div>

                            <div class='w-full flex inline md:w-1/2 px-3 mb-6 md:mb-0 mt-6 text-left py-3 pl-20'>
                                <button type='submit' class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                    <i class="fas fa-search"></i><span class="ml-3">Pesquisar</span>
                                </button>

                                <a href="/pf/pessoafisica/novo/" class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 ml-10 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                    <i class="fas fa-plus"></i><span class="ml-3">Novo</span>
                                </a>

                            </div>
                        </div>
                     </form>
                </div>

            </div>
            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <table class="w-full whitespace-no-wrap">
                    <tr class="text-left font-bold">
                    <th class="px-6 pt-6 pb-4">Registro</th>
                    <th class="px-6 pt-6 pb-4">Nome</th>
                    <th class="px-6 pt-6 pb-4">CPF</th>
                    <th class="px-6 pt-6 pb-4">E-mail</th>
                    <th class="px-6 pt-6 pb-4" colspan="2">Ação</th>
                    </tr>

                    @foreach ($pfs as $pf)

                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">

                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center focus:text-indigo-500">
                        {{ $pf->numero_carteira }}
                        </span>
                    </td>
                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center" tabindex="-1">
                        {{ $pf->nome }}
                        </span>
                    </td>
                    <td class="border-t">
                        <input disabled type="text" class="px-6 py-4 flex items-center" tabindex="-2" value="{{ $pf->cpf }}"/>
                    </td>
                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center" tabindex="-3">
                        {{$pf->email}}
                        </span>
                    </td>

                    <td class="border-t w-px">
                        <a href="/pf/pessoafisica/edicao/{{ $pf->idPessoa }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            <i class="fa fa-edit"></i>&nbsp;
                        </a>
                    </td>
                    </tr>
                    @endforeach

                    @if (count($pfs) == 0)
                        <tr>
                            <td class="border-t px-6 py-4" colspan="4">Sem resultados para essa pesquisa.</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

        <script type="text/javascript">

            fucntion novoProfissional(){

                alert({{route('pessoafisica.novo')}});
                window.location = "{{route('pessoafisica.novo')}}";
            }

        </script>
</x-app-layout>
