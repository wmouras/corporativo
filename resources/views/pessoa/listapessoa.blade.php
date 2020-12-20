<x-app-layout>
    <x-slot name="header">
        <h2 class='text-xl font-semibold leading-tight text-gray-800'>
            Lista de Registros
        </h2>
    </x-slot>

        <div class='px-3 py-3'>
            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <div class='overflow-hidden bg-white shadow-xl sm:rounded-lg'>

                    <form id="frmPesquisaPessoa" name="frmPesquisaPessoa" action="" x-on:click.prevent="" method="POST">

                        <div class='flex inline px-3 row col-md-6'>

                            <div class="h-12 py-3 text-left w-1/8">
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='codigo_registro'>
                                    Registro:
                                </label>

                                <input id='codigo_registro' name='codigo_registro' type='text' placeholder='Insira o registro' @keyup.enter="$event.target.nextElementSibling.focus()"
                                    class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-28 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                            </div>
                            <div class="w-1/4 h-12 py-3 pl-5 text-left">
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='nome'>
                                    Nome:
                                </label>
                                <input id='nome' name='nome' type='text' placeholder='Insira o nome'
                                    class='block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                            </div>
                            <div class="w-1/6 h-12 py-3 pl-5 text-left">
                                <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cpf'>
                                    CPF:
                                </label>
                                <input name='cpf' id='cpf' type='text' placeholder='Apenas números' v-mask="'##.###.###/####-##'"
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                            </div>

                            <div class='flex inline w-full px-3 py-3 pl-20 mt-6 mb-6 text-left md:w-1/2 md:mb-0'>
                                <button type='submit' class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                    <i class="fas fa-search"></i><span class="ml-3">Pesquisar</span>
                                </button>

                                <a href="/pf/pessoafisica/novo/" class='block px-4 py-3 mb-3 ml-10 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                    <i class="fas fa-plus"></i><span class="ml-3">Profissional</span>
                                </a>
                                <a href="/pj/pessoajuridica/novo/" class='block px-4 py-3 mb-3 ml-10 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                    <i class="fas fa-plus"></i><span class="ml-3">Empresa</span>
                                </a>

                            </div>
                        </div>
                     </form>
                </div>

            </div>
            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <table class="w-full whitespace-no-wrap">
                    <tr class="font-bold text-left">
                    <th class="px-6 pt-6 pb-4">Registro</th>
                    <th class="px-6 pt-6 pb-4">Nome</th>
                    <th class="px-6 pt-6 pb-4">CPF/CNPJ</th>
                    <th class="px-6 pt-6 pb-4">E-mail</th>
                    <th class="px-6 pt-6 pb-4" colspan="2">Ação</th>
                    </tr>

                    @foreach ($pessoas as $pessoa)

                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">

                    <td class="border-t">
                        <span class="flex items-center px-6 py-4 focus:text-indigo-500">
                        {{$pessoa->registro ?? ''}}
                        </span>
                    </td>
                    <td class="border-t">
                        <span class="flex items-center px-6 py-4" tabindex="-1">
                        {{ $pessoa->nome ?? '' }}
                        </span>
                    </td>
                    <td class="border-t">
                        <input disabled type="text" class="flex items-center px-6 py-4" tabindex="-2" value="{{ $pessoa->idReceita }}"/>
                    </td>
                    <td class="border-t">
                        <span class="flex items-center px-6 py-4" tabindex="-3">
                        {{$pessoa->email ?? '' }}
                        </span>
                    </td>

                    <td class="w-px border-t">
                        @if($pessoa->tipoPessoa == 1)
                        <a href="/pf/pessoafisica/edicao/{{ $pessoa->idPessoa }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                            <i class="fa fa-edit"></i>&nbsp;
                        </a>
                        @else
                            <a href="/pj/pessoajuridica/edicao/{{ $pessoa->idPessoa }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                                <i class="fa fa-edit"></i>&nbsp;
                            </a>
                        @endif

                    </td>
                    </tr>
                    @endforeach

                    @if (count($pessoas) == 0)
                        <tr>
                            <td class="px-6 py-4 border-t" colspan="4">Sem resultados para essa pesquisa.</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
</x-app-layout>
