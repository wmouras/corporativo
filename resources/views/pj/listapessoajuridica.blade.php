<x-app-layout>
    <x-slot name="header">
        <h2 class='text-xl font-semibold leading-tight text-gray-800'>
            Pessoa Jurídica
        </h2>
    </x-slot>

        <div class='py-1'>
            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <div class='overflow-hidden bg-white shadow-xl sm:rounded-lg'>

                    <div class='flex inline row col-md-6'>

                        <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='codigo_registro'>
                                Registro:
                            </label>

                            <input id='codigo_registro' name='codigo_registro' type='text' placeholder='Insira o registro' @keyup.enter="$event.target.nextElementSibling.focus()"
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-50 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>

                        <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>

                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='nome'>
                                Nome:
                            </label>
                            <input id='nome_fantasia' name='nome' type='text' placeholder='Insira o nome'
                                class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>

                        <div class='w-full px-3 mb-6 md:w-1/2 md:mb-0'>
                            <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase' for='cpf'>
                                CPF:
                            </label>
                            <input name='cpf' id='cpf' type='text' placeholder='Apenas números' v-mask="'##.###.###/####-##'"
                            class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>

                        </div>
                        <div class='w-full px-3 mt-6 mb-6 md:w-1/2 md:mb-0'>
                            <button type='button' class='block px-4 py-3 mb-3 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                <i class="fas fa-search"></i><span class="ml-3">Pesquisar</span>
                            </button>

                            <button type='button' class='block px-4 py-3 mb-3 ml-10 leading-tight text-gray-700 border rounded appearance-none w-65 bg-gray-50 border-blue-50 focus:outline-none focus:bg-white'>
                                <i class="fas fa-plus"></i><span class="ml-3">Novo</span>
                            </button>

                        </div>
                    </div>
                </div>

            </div>
            <div class='mx-auto max-w-7xl sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <table class="w-full whitespace-no-wrap">
                    <tr class="font-bold text-left">
                    <th class="px-6 pt-6 pb-4">Registro</th>
                    <th class="px-6 pt-6 pb-4">Nome</th>
                    <th class="px-6 pt-6 pb-4">CPF</th>
                    <th class="px-6 pt-6 pb-4">E-mail</th>
                    <th class="px-6 pt-6 pb-4" colspan="2">Ação</th>
                    </tr>

                    @foreach ($pfs as $pf)

                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">

                    <td class="border-t">
                        <span class="flex items-center px-6 py-4 focus:text-indigo-500">
                        {{ $pf->codigo_registro }}
                        </span>
                    </td>
                    <td class="border-t">
                        <span class="flex items-center px-6 py-4" tabindex="-1">
                        {{ $pf->nome }}
                        </span>
                    </td>
                    <td class="border-t">
                        <input disabled type="text" class="flex items-center px-6 py-4" tabindex="-2" value="{{ $pf->cpf }}"/>
                    </td>
                    <td class="border-t">
                        <span class="flex items-center px-6 py-4" tabindex="-3">
                        Teste@teste.com
                        </span>
                    </td>

                    <td class="w-px border-t">
                        <a href="/pf/pessoafisica/dados/{{ $pf->fk_id_pessoa }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                            <i class="fa fa-edit"></i>&nbsp;
                        </a>
                    </td>
                    </tr>
                    @endforeach

                    @if (count($pfs) == 0)
                        <tr>
                            <td class="px-6 py-4 border-t" colspan="4">Sem resultados para essa pesquisa.</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
</x-app-layout>
